<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\JenisModel;
use App\Models\PaketModel;
use App\Models\OutletModel;
use App\Models\MemberModel;
use App\Models\DiskonModel;
use App\Models\TransaksiModel;
use Hermawan\DataTables\DataTable;
use Dompdf\Dompdf;
use Dompdf\Options;

class Layanan extends BaseController
{
	// 1. Member
	// 2. Paket
	// 3. Diskon
	// 4. Jenis
	// 5. Transaksi
	// 6. Laporan

	private $data;
	public function __construct() 
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->uri = service('uri');
		$this->id = session()->id_outlet;
		$this->jenisModel = new JenisModel();
		$this->paketModel = new PaketModel();
		$this->outletModel = new OutletModel();
		$this->memberModel = new MemberModel();
		$this->diskonModel = new diskonModel();
		$this->transaksiModel = new TransaksiModel();
		$this->userModel = new UserModel();

		if (session()->role == 'owner' || session()->role == 'admin') {
			$this->data['setting'] = $this->outletModel->findAll();
		}
	}

	// 1. Member	
	// ---------------------------------------
	public function render_member()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Member';
		$this->data['member'] = $this->memberModel->where('id_outlet', $this->id)->findAll();
		return view('member/index', $this->data);
	}
	public function render_form_member($id='')
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Member';
		if(!$id){
			$this->data['subtitle'] = 'Tambah Member';
			$this->data['infotitle'] = 'Form pendaftaran member baru';
			$this->data['infomember'] = null;
			$this->data['action'] = site_url('services/member/tambah-member');
			$this->data['id'] = 'addMember';
		}else{
			$this->data['subtitle'] = 'Edit Member';
			$this->data['infotitle'] = 'Form edit data member';
			$this->data['infomember'] = $this->memberModel->find($id);
			$this->data['action'] = site_url('services/member/edit-member/'.$id);
			$this->data['id'] = 'editMember';
		}
		return view('member/form', $this->data);
	}
	public function insert_member()
	{
		$request = $this->request->getPost('data');
		$request['id_outlet'] = $this->id;
		$response = $this->memberModel->insert($request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->memberModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menambahkan member baru', 'url'=> site_url('services/member')]);
	}
	public function update_member($id)
	{
		$request = $this->request->getRawInput()['data'];
		$response = $this->memberModel->update($id, $request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->memberModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil melakukan perubahan data member', 'url'=> site_url('services/member')]);
	}
	public function delete_member($id)
	{
		$result = $this->memberModel->delete($id);
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menghapus paket', 'id'=>$id]);
	}
	// ---------------------------------------


	// 2. Paket
	// ---------------------------------------
	public function render_paket()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Paket';
		$this->data['paket'] = $this->paketModel
							->select('ldr_outlet.nama_outlet, ldr_paket.*')
							->join('ldr_outlet', 'ldr_paket.id_outlet = ldr_outlet.id_outlet')
							->where('ldr_paket.id_outlet', $this->id)->findAll();
		return view('paket/index', $this->data);
	}
	public function render_form_paket($id='')
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Paket';
		if(!$id){
			$this->data['subtitle'] = 'Tambah paket';
			$this->data['infotitle'] = 'Form pendaftaran paket baru';
			$this->data['infopaket'] = null;
			$this->data['checked'] = null;
			$this->data['jenispaket'] = $this->jenisModel->where('id_outlet', $this->id)->findAll();
			$this->data['action'] = site_url('services/paket/tambah-paket');
			$this->data['id'] = 'addPaket';
		}else{
			$this->data['subtitle'] = 'Edit paket';
			$this->data['infotitle'] = 'Form edit data paket';
			$this->data['infopaket'] = $this->paketModel->find($id);
			$arguments = explode(',', $this->data['infopaket']->jenis_paket);
			$this->data['checked'] = $this->jenisModel->select('id_jenis')
								->whereIn('id_jenis', $arguments)
								->findAll();
			$this->data['jenispaket'] = $this->jenisModel->where('id_outlet', $this->id)->findAll();
			$this->data['action'] = site_url('services/paket/edit-paket/'.$id);
			$this->data['id'] = 'editPaket';
		}
		return view('paket/form', $this->data);
	}	
	public function insert_paket()
	{
		$request = $this->request->getPost('data');
		$request['id_outlet'] = $this->id;
		$response = $this->paketModel->insert($request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->paketModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menambahkan paket baru', 'url'=> site_url('services/paket')]);
	}
	public function update_paket($id)
	{
		$request = $this->request->getRawInput()['data'];
		$request['id_outlet'] = $this->id;
		$response = $this->paketModel->update($id, $request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->paketModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil melakukan perubahan data paket', 'url'=> site_url('services/paket')]);
	}
	public function delete_paket($id)
	{
		$response = $this->paketModel->delete($id);
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menghapus paket', 'id'=>$id]);
	}
	// ---------------------------------------


	// 3. Diskon
	// ---------------------------------------
	public function render_diskon()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Jenis Paket';
		$this->data['diskon'] = $this->diskonModel->where('id_outlet', $this->id)->findAll();
		return view('diskon/index', $this->data);
	}
	public function render_form_diskon($id='')
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Diskon';
		if(!$id){
			$this->data['subtitle'] = 'Tambah Diskon';
			$this->data['infotitle'] = 'Form pendaftaran diskon baru';
			$this->data['infoDiskon'] = null;
			$this->data['action'] = site_url('services/diskon/tambah-diskon');
			$this->data['id'] = 'addDiskon';
		}else{
			$this->data['subtitle'] = 'Edit diskon';
			$this->data['infotitle'] = 'Form edit data diskon';
			$this->data['infoDiskon'] = $this->diskonModel->find($id);
			$this->data['action'] = site_url('services/diskon/edit-diskon/'.$id);
			$this->data['id'] = 'editDiskon';
		}
		return view('diskon/form', $this->data);
	}

	public function check_diskon()
	{
		$request = $this->request->getPost('data');
		$response = $this->diskonModel->where(['kode_diskon'=>$request, 'id_outlet' => $this->id])->first();
		return json_encode($response);
	}

	public function insert_diskon()
	{
		$request = $this->request->getPost('data');
		$request['id_outlet'] = $this->id;
		$response = $this->diskonModel->insert($request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->diskonModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menambahkan diskon baru', 'url'=> site_url('services/diskon')]);
	}
	public function update_diskon($id)
	{
		$request = $this->request->getRawInput()['data'];
		$request['id_outlet'] = $this->id;
		$response = $this->diskonModel->update($id, $request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->diskonModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil melakukan perubahan data diskon', 'url'=> site_url('services/diskon')]);	
	}
	public function delete_diskon($id)
	{
		$response = $this->diskonModel->delete($id);
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menghapus diskon']);
	}
	// ---------------------------------------


	// 4. Jenis
	// ---------------------------------------
	public function render_jenis()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Jenis Paket';
		$this->data['jenis'] = $this->jenisModel->where('id_outlet', $this->id)->findAll();
		return view('jenis/index', $this->data);
	}
	public function insert_jenis()
	{
		if ($this->jenisModel->countAll() == 6) {
			return json_encode(['status'=> 'error', 'message'=> 'Telah mencapai jumlah maksimum penambahan jenis paket']);
		}
		$request = $this->request->getPost('data');
		$request['id_outlet'] = $this->id;
		$response = $this->jenisModel->insert($request);
		$this->data = $this->jenisModel->where('id_outlet', $this->id)->find($this->jenisModel->getInsertID());
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menambahkan jenis baru', 'data'=>$this->data]);
	}
	public function update_jenis($id)
	{
		$request = $this->request->getRawInput()['data'];
		$response = $this->jenisModel->update($id, $request);
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil melakukan perubahan jenis']);
	}
	public function delete_jenis($id)
	{
		$response = $this->jenisModel->delete($id);
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menghapus jenis', 'id'=>$id]);
	}
	// ---------------------------------------


	// 5. Transaksi
	// ---------------------------------------
	public function render_transaksi()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Transaksi';
		$this->data['transaksi'] = $this->transaksiModel->builder('vTransaksi')->where('id_outlet', session()->id_outlet)->orderBy('created_at', 'DESC')->get()->getResult();
		return view('transaction/index', $this->data);
	}
	public function render_form_transaksi($id='')
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Transaksi';
		$this->data['nameOption'] = $this->memberModel->where('id_outlet', $this->id)->findAll();
		$this->data['paketOption'] = $this->paketModel->where('id_outlet', $this->id)->findAll();
		$this->data['jenisOption'] = $this->jenisModel->where('id_outlet', $this->id)->findAll();
		$this->data['diskonOption'] = $this->diskonModel->where(['tgl_mulai <=' => date('Y-m-d h:i:s'), 'tgl_selesai >=' => date('Y-m-d h:i:s'), 'id_outlet'=>$this->id])->findAll();
		return view('transaction/form', $this->data);
	}
	public function render_detail_transaksi($id)
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Transaksi';
		$this->data['dataTransaksi'] = $this->transaksiModel->builder('vDetailTransaksi')->where('id_transaksi', $id)->get()->getRow();
		return view('transaction/detail', $this->data);
	}
	public function cetak_invoice($id)
	{
		$data['title'] = 'Invoice Transaksi';
		$data['response'] = $this->transaksiModel->builder('vDetailTransaksi')->where('id_transaksi', $id)->get()->getRow();

		$options = new Options();
		$options->set('defaultFont', 'Helvetica');
		$dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('templates/invoice', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
	}
	public function insert_transaksi()
	{
		$dataMember = $this->request->getPost('data');
		$dataTransaksi = $this->request->getPost('data2');
		$response = $this->transaksiModel->insert_transaksi($dataTransaksi, $dataMember);
		return json_encode($response);
	}
	public function update_transaksi($id, $proses)
	{
		switch ($proses) {
			case '2':
				$data = ['status_pengerjaan'=>'proses'];
				break;
			case '3':
				$data = ['status_pengerjaan'=>'selesai'];
				break;
			case '4':
				$data = ['status_pengerjaan'=>'diambil'];
			break;
		}
		$response = $this->transaksiModel->update($id, $data);
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil melakukan perubahan status']);
	}
	public function update_transaksi_bayar($id)
	{
		$request = ['status_bayar'=>'dibayar'];
		$response = $this->transaksiModel->update($id, $request);
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil melakukan pembayaran']);
	}
	// ---------------------------------------


	// 6. Laporan
	// ---------------------------------------
	public function render_laporan()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Laporan';
		return view('laporan/index', $this->data);
	}
	public function render_laporan_data()
	{
		$request = $this->request->getPost('data');
		$response = $this->transaksiModel->builder('vlaporan')->where(['created_at >=' => $request['startDate'], 'created_at <=' => $request['endDate'], 'id_outlet' => $this->id])->get()->getResult();
		foreach ($response as $item) {
			$item->tgl_bayar = date('d-m-Y', strtotime($item->tgl_bayar));
		}
		
		return json_encode($response);
	}
	public function download_laporan()
	{
		$request = $this->request->getGet();
		$data['title'] = 'Laporan Penghasilan';
		$data['response'] = $this->transaksiModel->builder('vlaporan')->where(['created_at >=' => $request['startDate'], 'created_at <=' => $request['endDate'], 'id_outlet' => $this->id])->get()->getResult();
		$data['start'] = date('j F Y', strtotime($request['startDate']));
		$data['end'] = date('j F Y', strtotime($request['endDate']));
		
		$options = new Options();
		$options->set('defaultFont', 'Helvetica');
		$dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('templates/laporan', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
		
	}
	// ---------------------------------------


	// ---------------------------------------
	public function setting()
	{
		$request = $this->request->getRawInput()['data'];
		if ($request['pajak'] != null) {
			$response =$this->userModel->where('id_outlet',session()->id_outlet)->set(['pajak'=>$request['pajak']])->update();
			var_dump($response);die;
			session()->set('pajak', (int)$request['pajak']/100);
		}
		if (isset($request['outlet']) && $request['outlet'] != null) {
			$this->userModel->update(session()->id_user, ['id_outlet'=>$request['outlet']]);
			session()->set('id_outlet', $request['outlet']);
		}
		return json_encode(['status'=> 'success']);
	}
	// ---------------------------------------


	public function tes()
	{
		// $validation = \Config\Services::validation();
		// $result = $this->request;
		$data= [
			'nama_paket' => 't0',
			'harga' => '1000',
			'jenis_paket' => ''
		];
		$this->paketModel->insert($data);
		$start = '2021-04-21';
		$end = '2021-04-24 23:59:59';
		// $data = $this->jenisModel->where('id_outlet', $this->id)->findAll();
		// dd($response = $this->transaksiModel->builder('vlaporan')->where(['created_at >=' => $start, 'created_at <=' => $end, 'id_outlet' => $this->id])->get()->getResult());
		// dd($this->jenisModel->insert($data));die;
		$pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);
		dd($pdf);
	}
}
