<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createldrdiskon extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_diskon' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'id_outlet INT(11)',
			'kode_diskon VARCHAR(255)',
			'nama_diskon VARCHAR(255)',
			'diskon INT(11)',
			'syarat INT(11)',
			'keterangan VARCHAR(255)',
			'tgl_mulai DATETIME',
			'tgl_selesai DATETIME',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id_diskon', TRUE);
		$this->forge->createTable('ldr_diskon', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('ldr_diskon');
	}
}
