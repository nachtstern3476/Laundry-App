<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaketSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id_outlet' => 1,
				'nama_paket' => 'Cuci Setrika',
				'jenis_paket' => '1',
				'harga' => 10000,
			],
			[
				'id_outlet' => 1,
				'nama_paket' => 'Cuci Kilat',
				'jenis_paket' => '2',
				'harga' => 12000,
			],
			[
				'id_outlet' => 1,
				'nama_paket' => 'Cuci Basah',
				'jenis_paket' => '1',
				'harga' => 8000,
			],
			[
				'id_outlet' => 1,
				'nama_paket' => 'Cuci Hemat',
				'jenis_paket' => '2,3',
				'harga' => 18000,
			],
			[
				'id_outlet' => 2,
				'nama_paket' => 'Cuci Setrika',
				'jenis_paket' => '1',
				'harga' => 10000,
			],
			[
				'id_outlet' => 2,
				'nama_paket' => 'Cuci Kilat',
				'jenis_paket' => '2',
				'harga' => 12000,
			],
			[
				'id_outlet' => 2,
				'nama_paket' => 'Cuci Basah',
				'jenis_paket' => '1',
				'harga' => 8000,
			],
			[
				'id_outlet' => 2,
				'nama_paket' => 'Cuci Hemat',
				'jenis_paket' => '2,3',
				'harga' => 18000,
			],
		];

		foreach ($data as $item) {
			$this->db->table('ldr_paket')->insert($item);
		}
	}
}
