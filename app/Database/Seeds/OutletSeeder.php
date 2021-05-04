<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OutletSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama_outlet' => 'laundry meriah',
				'alamat' => 'Jl Sengkawi Raya no 1',
				'telp' => '08502848214',
				'email' => 'laundrymeriah@gmail.com',
			],
			[
				'nama_outlet' => 'laundry murah',
				'alamat' => 'Jl Sengkawi Raya no 1',
				'telp' => '08502846124',
				'email' => 'laundrymurah@gmail.com',
			],
			[
				'nama_outlet' => 'laundry cepat',
				'alamat' => 'Jl Mangga Raya no 2',
				'telp' => '08502841251',
				'email' => 'laundrybanget@gmail.com',
			],
			[
				'nama_outlet' => 'laundry bersih',
				'alamat' => 'Jl Mangga Raya no 3',
				'telp' => '08502848210',
				'email' => 'laundrybersih@gmail.com',
			],
			[
				'nama_outlet' => 'laundry hemat',
				'alamat' => 'Jl Mangga Raya no 4',
				'telp' => '08502848210',
				'email' => 'laundryhemat@gmail.com',
			],
		];

		foreach ($data as $item) {
			$this->db->table('ldr_outlet')->insert($item);
		}
	}
}
