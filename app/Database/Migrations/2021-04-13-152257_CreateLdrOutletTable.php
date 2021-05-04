<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLdrOutletTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_outlet' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'nama_outlet VARCHAR(255)',
			'alamat TEXT',
			'email VARCHAR(255)',
			'telp VARCHAR(255)',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id_outlet', TRUE);
		$this->forge->createTable('ldr_outlet', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('ldr_outlet');
	}
}
