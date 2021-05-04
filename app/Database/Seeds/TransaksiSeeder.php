<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id_outlet'=> 1,
				'id_member'=> 1,
				'id_user'=> 1,
				'kode_invoice'=> 'TRXLDR11404202122011',
				'status_bayar'=> 'belum_dibayar',
				'status_pengerjaan'=> 'proses',
				'tgl_bayar'=> null,
				'tgl_ambil'=> '2021-01-28 13:47:04',
			],
			[
				'id_outlet'=> 1,
				'id_member'=> 3,
				'id_user'=> 2,
				'kode_invoice'=> 'TRXLDR21404202121511',
				'status_bayar'=> 'dibayar',
				'status_pengerjaan'=> 'diambil',
				'tgl_bayar'=> '2021-01-25 13:47:04',
				'tgl_ambil'=> '2021-01-28 13:47:04',
			],
			[
				'id_outlet'=> 2,
				'id_member'=> 2,
				'id_user'=> 2,
				'kode_invoice'=> 'TRXLDR21404202125111',
				'status_bayar'=> 'dibayar',
				'status_pengerjaan'=> 'selesai',
				'tgl_bayar'=> '2021-01-25 13:47:04',
				'tgl_ambil'=> '2021-01-28 13:47:04',
			],
			[
				'id_outlet'=> 1,
				'id_member'=> 2,
				'id_user'=> 1,
				'kode_invoice'=> 'TRXLDR11404202123411',
				'status_bayar'=> 'belum_dibayar',
				'status_pengerjaan'=> 'proses',
				'tgl_bayar'=> null,
				'tgl_ambil'=> '2021-01-28 13:47:04',
			],
			[
				'id_outlet'=> 1,
				'id_member'=> 5,
				'id_user'=> 2,
				'kode_invoice'=> 'TRXLDR21404202122311',
				'status_bayar'=> 'dibayar',
				'status_pengerjaan'=> 'diambil',
				'tgl_bayar'=> '2021-01-25 13:47:04',
				'tgl_ambil'=> '2021-01-28 13:47:04',
			],
			[
				'id_outlet'=> 1,
				'id_member'=> 5,
				'id_user'=> 2,
				'kode_invoice'=> 'TRXLDR21404202121211',
				'status_bayar'=> 'belum_dibayar',
				'status_pengerjaan'=> 'proses',
				'tgl_bayar'=> null,
				'tgl_ambil'=> '2021-01-28 13:47:04',
			],
		];

		foreach ($data as $item) {
			$this->db->table('ldr_transaksi')->insert($item);
		}
	}
}
