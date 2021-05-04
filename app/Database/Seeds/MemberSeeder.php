<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'id_outlet' => '1',
				'nama' => 'Rudi Danuarta',
				'alamat' => 'Jl Sengkawi 4 no 8',
				'telp' => '082289224898',
				'gender' => 'L',
			],
			[
				'id_outlet' => '1',
				'nama' => 'Alex Putra',
				'alamat' => 'Jl Sengkawi 2 no 6',
				'telp' => '082289224124',
				'gender' => 'L',
			],
			[
				'id_outlet' => '1',
				'nama' => 'Jhon Doe',
				'alamat' => 'Jl Sengkawi 6 no 2',
				'telp' => '082289224082',
				'gender' => 'L',
			],
			[
				'id_outlet' => '1',
				'nama' => 'Jhon Doe',
				'alamat' => 'Jl Sengkawi 5 no 2',
				'telp' => '082289224512',
				'gender' => 'L',
			],
			[
				'id_outlet' => '1',
				'nama' => 'Samuel Wicaksonoo',
				'alamat' => 'Jl Sengkawi 4 no 3',
				'telp' => '082289224575',
				'gender' => 'L',
			],
			[
				'id_outlet' => '2',
				'nama' => 'Joshua Andi',
				'alamat' => 'Jl Sengkawi 2 no 7',
				'telp' => '082289224192',
				'gender' => 'L',
			],
			[
				'id_outlet' => '2',
				'nama' => 'Ronald Ardi',
				'alamat' => 'Jl Sengkawi 3 no 2',
				'telp' => '082289224281',
				'gender' => 'L',
			],
			[
				'id_outlet' => '2',
				'nama' => 'Rendi Syaputra',
				'alamat' => 'Jl Sengkawi 2 no 1',
				'telp' => '082289224972',
				'gender' => 'L',
			],
			[
				'id_outlet' => '2',
				'nama' => 'Budi Harjo',
				'alamat' => 'Jl Sengkawi 1 no 5',
				'telp' => '082289224731',
				'gender' => 'L',
			],
			[
				'id_outlet' => '2',
				'nama' => 'Eka Sanjaya',
				'alamat' => 'Jl Sengkawi 3 no 1',
				'telp' => '082289524898',
				'gender' => 'L',
			],
		];

		foreach ($data as $item) {
			$this->db->table('ldr_member')->insert($item);
		}
	}
}
