<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSeeder extends Seeder
{
	public function run()
	{
		for ($i=1; $i <= 5; $i++) { 
			$data = [
				[
					'id_outlet' => $i,
					'nama_jenis' => 'Kiloan',
				],
				[
					'id_outlet' => $i,
					'nama_jenis' => 'Selimut',
				],
				[
					'id_outlet' => $i,
					'nama_jenis' => 'Bedcover',
				],
			];	
			foreach ($data as $item) {
				$this->db->table('ldr_jenis')->insert($item);
			}
		}

	}
}
