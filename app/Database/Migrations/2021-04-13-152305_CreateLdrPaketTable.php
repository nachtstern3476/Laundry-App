<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLdrPaketTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_paket' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'id_outlet INT(11)',
			'nama_paket VARCHAR(255)',
			'jenis_paket VARCHAR(255)',
			'harga INT(11)',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);

		$this->forge->addKey('id_paket', TRUE);
		$this->forge->createTable('ldr_paket', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('ldr_paket');
	}
}
