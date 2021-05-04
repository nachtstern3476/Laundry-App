<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MemberModel;
use App\Models\OutletModel;
use App\Models\PaketModel;
use App\Models\JenisModel;
use App\Models\TransaksiModel;

class Admin extends BaseController
{
	private $data;
	public function __construct() 
	{
		date_default_timezone_set('Asia/Jakarta');
		if (session()->role != 'admin') {
			return redirect()->to(site_url('/'));
		}
		$this->userModel = new UserModel();
		$this->memberModel = new MemberModel();
		$this->transaksiModel = new TransaksiModel();
		$this->outletModel = new OutletModel();
		$this->paketModel = new PaketModel();
		$this->jenisModel = new JenisModel();

		$this->data['setting'] = $this->outletModel->findAll();
	}

	public function index()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Dashboard';
		$this->data['totalMember'] = $this->memberModel->countAll();
		$this->data['totalOutlet'] = $this->outletModel->countAll();
		$this->data['totalTransaksi'] = $this->transaksiModel->countAll();
		$this->data['transaksi'] = $this->transaksiModel->builder('vTransaksi')->where('id_outlet', session()->id_outlet)->limit(3)->orderBy('created_at', 'DESC')->get()->getResult();
		return view('admin/index', $this->data);
	}

	// ---------------------------------------
	public function render_user()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - User';
		$this->data['user'] = $this->userModel->select('ldr_user.*, outlet.nama_outlet')
								->join('ldr_outlet AS outlet', 'ldr_user.id_outlet=outlet.id_outlet')
								->where('role !=', 'admin')->orderBy('nama', 'ASC')->findAll();
		return view('admin/user/index', $this->data);
	}
	public function render_form_user($id = '')
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - User';
		if(!$id){
			$this->data['subtitle'] = 'Tambah user';
			$this->data['infotitle'] = 'Form pendaftaran user baru';
			$this->data['infoUser'] = null;
			$this->data['outlet'] = $this->outletModel->findAll();
			$this->data['action'] = site_url('master/user/tambah-user');
			$this->data['id'] = 'addUser';
		}else{
			$this->data['subtitle'] = 'Edit user';
			$this->data['infotitle'] = 'Form edit data user';
			$this->data['infoUser'] = $this->userModel->find($id);
			$this->data['outlet'] = $this->outletModel->findAll();
			$this->data['action'] = site_url('master/user/edit-user/'.$id);
			$this->data['id'] = 'editUser';
		}
		return view('admin/user/form', $this->data);
	}
	public function insert_user()
	{
		$request = $this->request->getPost('data');
		$response = $this->userModel->insert($request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->userModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menambahkan user baru', 'url'=> site_url('master/user')]);
	}
	public function update_user($id)
	{
		$request = $this->request->getRawInput()['data'];
		$response = $this->userModel->update($id, $request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->userModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil merubah data user', 'url'=> site_url('master/user')]);	
	}
	public function delete_user($id)
	{
		$response = $this->userModel->delete($id);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->userModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menghapus data user', 'id'=>$id]);
	}
	// ---------------------------------------


	// ---------------------------------------
	public function render_outlet()
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Outlet';
		$this->data['outlet'] = $this->outletModel->orderBy('nama_outlet', 'ASC')->findAll();
		return view('admin/outlet/index', $this->data);
	}
	public function render_form_outlet($id='')
	{
		$this->data['title'] = ucwords(session()->nama_outlet).' - Outlet';
		if(!$id){
			$this->data['subtitle'] = 'Tambah outlet';
			$this->data['infotitle'] = 'Form pendaftaran outlet baru';
			$this->data['infoOutlet'] = null;
			$this->data['action'] = site_url('master/outlet/tambah-outlet');
			$this->data['id'] = 'addOutlet';
		}else{
			$this->data['subtitle'] = 'Edit outlet';
			$this->data['infotitle'] = 'Form edit data outlet';
			$this->data['infoOutlet'] = $this->outletModel->find($id);
			$this->data['action'] = site_url('master/outlet/edit-outlet/'.$id);
			$this->data['id'] = 'editOutlet';
		}
		return view('admin/outlet/form', $this->data);
	}
	public function insert_outlet()
	{
		$request = $this->request->getPost('data');
		$response = $this->outletModel->insert($request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->outletModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menambahkan outlet baru', 'url'=> site_url('master/outlet')]);
	}
	public function update_outlet($id='')
	{
		$request = $this->request->getRawInput()['data'];
		$response = $this->outletModel->update($id, $request);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->outletModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil merubah data outlet', 'url'=> site_url('master/outlet')]);
	}
	public function delete_outlet($id='')
	{
		$response = $this->outletModel->delete($id);
		if (!$response) {
			return json_encode(['error'=>true, 'errorItem'=>$this->userModel->errors()]);
		}
		return json_encode(['status'=> 'success', 'message'=> 'Berhasil menghapus data outlet', 'id'=>$id]);
	}
	// ---------------------------------------

	public function tes()
	{
		// $request = [
		// 	'nama' => 't',
		// 	'username' => 't',
		// 	'password' => 't',
		// 	'outlet' => 't',
		// 	'role' => 't',
		// ];
	}
}
