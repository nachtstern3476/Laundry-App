<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLdrMemberTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_member' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'id_outlet INT(11)',
			'nama VARCHAR(255)',
			'alamat VARCHAR(255)',
			'telp VARCHAR(255)',
			'gender ENUM("L","P")',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id_member', TRUE);
		$this->forge->createTable('ldr_member', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('ldr_member');
	}
}
