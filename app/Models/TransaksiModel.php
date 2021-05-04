<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table                = 'ldr_transaksi';
	protected $primaryKey           = 'id_transaksi';
	protected $returnType           = 'object';
	protected $protectFields        = false;

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	protected $validationRules      = 'formTransaksi';

	// Callbacks
	// protected $allowCallbacks       = true;
	// protected $beforeInsert         = [];
	// protected $afterInsert          = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];

	function insert_transaksi($data, $data_member)
	{
		$sql_member = "CALL newMember(?,?,?,?,?,@id)";
		$sql_member_select = "SELECT @id AS idMember";
		$sql_transaction = "CALL newTransaction(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		// Transaction
		$id_outlet = session()->id_outlet;
		$id_member = isset($data_member["idMember"]) ? $data_member["idMember"] : '';
		$id_user = session()->id_user;
		$kode_invoice = 'TRXLDR'.date('dmYHis');
		$status_bayar = $data["jumlahBayar"]?'dibayar':'belum_dibayar';
		$status_pengerjaan = "baru";
		$pajak = $data['pajak'];
		$diskon = $data['diskon'];
		$tanggal_bayar = $data['jumlahBayar'] ? date('Y-m-d H:i:s') : null;
		$tanggal_ambil = $data["waktuAmbil"];		

		// Detail Transaction
		$id_paket = $data["idPaket"];
		$harga_total = $data["totalHarga"];
		$jumlah_bayar = $data["jumlahBayar"];
		$kembalian = $data["kembalian"];
		$keterangan = $data["keterangan"];
		$qty = $data["beratLaundry"];

		$this->db->transStart();
		if (count($data_member) > 1) {
			$this->db->query($sql_member, []);
			$result = $this->db->query($sql_member_select)->getRow();
			$id_member = $result->idMember;
		}
		$this->db->query($sql_transaction, [$id_outlet,
			$id_member, $id_user, $kode_invoice, $status_bayar,
			$status_pengerjaan, $pajak, $diskon, $tanggal_bayar, $tanggal_ambil,
			$id_paket, $harga_total, $jumlah_bayar, $kembalian, 
			$keterangan, $qty]);
		$this->db->transComplete();
		if ($this->db->transStatus() == FALSE) {
			return ['status'=> 'error', 'message' => 'Terjadi kesalahan harap ulangi proses pengisian form', 'url'=>site_url('services/transaksi/tambah-transaksi')];
		}
		return ['status'=> 'success', 'message'=>'Berhasil mendaftarkan data laundry', 'url'=>site_url('services/transaksi')];
	}
	public function update_transaksi()
	{
		
	}
}
