<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createldrjenis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_jenis' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'id_outlet INT(11)',
			'nama_jenis VARCHAR(255)',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);

		$this->forge->addKey('id_jenis', TRUE);
		$this->forge->createTable('ldr_jenis', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('ldr_jenis');
	}
}
