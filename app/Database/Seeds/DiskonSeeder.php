<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id_outlet' => '1',
				'kode_diskon' => 'GRANDOPENING',
				'nama_diskon' => 'Grand Opening',
				'diskon' => '20',
				'syarat' => '1000',
				'keterangan' => 'Diskon grand opening sebesar 20% untuk pembayaran minimal Rp. 1000',
				'tgl_mulai' => '2021-05-01',
				'tgl_selesai' => '2021-05-20'
			],
			[
				'id_outlet' => '1',
				'kode_diskon' => 'LEBIHHEMAT',
				'nama_diskon' => 'Lebih Hemat',
				'diskon' => '40',
				'syarat' => '20000',
				'keterangan' => 'Diskon sebesar 40% untuk pembayaran minimal Rp. 20000',
				'tgl_mulai' => '2021-05-01',
				'tgl_selesai' => '2021-05-20'
			],
			[
				'id_outlet' => '1',
				'kode_diskon' => 'COBADULU',
				'nama_diskon' => 'Member Baru',
				'diskon' => '20',
				'syarat' => '10000',
				'keterangan' => 'Diskon member baru sebesar 20% untuk pembayaran minimal Rp. 10000',
				'tgl_mulai' => '2021-05-01',
				'tgl_selesai' => '2021-05-20'
			],
		];

		foreach ($data as $item) {
			$this->db->table('ldr_diskon')->insert($item);
		}
	}
}
