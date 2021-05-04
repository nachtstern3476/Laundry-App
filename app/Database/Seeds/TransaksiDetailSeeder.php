<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransaksiDetailSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id_transaksi' => '1',
				'id_paket' => '1',
				'keterangan' => 'lorem ipsum dolor sit amet',
				'qty' => 2,
				'harga_total' => 20000,
				'jumlah_bayar' => 20000,
				'kembalian' => 0
			],
			[
				'id_transaksi' => '2',
				'id_paket' => '2',
				'keterangan' => 'lorem ipsum dolor sit amet nomor 2',
				'qty' => 1,
				'harga_total' => 16000,
				'jumlah_bayar' => 20000,
				'kembalian' => 4000
			],
			[
				'id_transaksi' => '3',
				'id_paket' => '3',
				'keterangan' => 'lorem ipsum dolor sit amet nomor 2',
				'qty' => 4,
				'harga_total' => 20000,
				'jumlah_bayar' => 20000,
				'kembalian' => 0
			],
		];

		foreach ($data as $item) {
			$this->db->table('ldr_detail_transaksi')->insert($item);
		}
	}
}
