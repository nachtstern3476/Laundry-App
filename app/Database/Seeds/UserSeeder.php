<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama' => 'Yeremia Wijaya',
				'id_outlet' => 1,
				'username' => 'admin',
				'password' => 'l8T7P8kQ5Ig8KObCc6d5iXlCXxl0Evi1n0EQAzZ7r7eUN7vFSMhHO8HTdgIo2tlFBU4x1//MUqY2yhBoSPYeIFhKRoGxP1tF1uco05xqH2kzLM0w5A',
				'role' => 'admin'
			],
			[
				'nama' => 'Jhon Doe',
				'id_outlet' => 1,
				'username' => 'kasir',
				'password' => 'IFrxEuhpz/WY0NfEMWZVDjgnOLkcF0C8k8KWoWgLcdLeLu+X/ac6zlbFGz0CcNWfL9eEv3PYv7Qi5S4CWfZlWrp6Yv8Dc62PGgPjzT0GViB+ivJOxA==',
				'role' => 'kasir'
			],
			[
				'nama' => 'Jhon Doe',
				'id_outlet' => 1,
				'username' => 'owner',
				'password' => 'DrNOu16Xg5GffIz0EZU2eKX8csRxoCGevylKBTg4plFWF0MlqnACzTnR4CytaBMUd0mFGo08F/JNDRz8/mvdjsxU9tEum6AB12e2x+k5uKiNxjwoMQ==',
				'role' => 'owner'
			],
			[
				'nama' => 'Jhon Doe',
				'id_outlet' => 2,
				'username' => 'kasir2',
				'password' => 'IFrxEuhpz/WY0NfEMWZVDjgnOLkcF0C8k8KWoWgLcdLeLu+X/ac6zlbFGz0CcNWfL9eEv3PYv7Qi5S4CWfZlWrp6Yv8Dc62PGgPjzT0GViB+ivJOxA==',
				'role' => 'kasir'
			],
			[
				'nama' => 'Jhon Doe',
				'id_outlet' => 2,
				'username' => 'owner2',
				'password' => 'DrNOu16Xg5GffIz0EZU2eKX8csRxoCGevylKBTg4plFWF0MlqnACzTnR4CytaBMUd0mFGo08F/JNDRz8/mvdjsxU9tEum6AB12e2x+k5uKiNxjwoMQ==',
				'role' => 'owner'
			],
			[
				'nama' => 'Jhon Doe',
				'id_outlet' => 3,
				'username' => 'kasir3',
				'password' => 'IFrxEuhpz/WY0NfEMWZVDjgnOLkcF0C8k8KWoWgLcdLeLu+X/ac6zlbFGz0CcNWfL9eEv3PYv7Qi5S4CWfZlWrp6Yv8Dc62PGgPjzT0GViB+ivJOxA==',
				'role' => 'kasir'
			],
			[
				'nama' => 'Jhon Doe',
				'id_outlet' => 3,
				'username' => 'owner3',
				'password' => 'DrNOu16Xg5GffIz0EZU2eKX8csRxoCGevylKBTg4plFWF0MlqnACzTnR4CytaBMUd0mFGo08F/JNDRz8/mvdjsxU9tEum6AB12e2x+k5uKiNxjwoMQ==',
				'role' => 'owner'
			],
		];

		foreach ($data as $item) {
			$this->db->table('ldr_user')->insert($item);
		}
	}
}
