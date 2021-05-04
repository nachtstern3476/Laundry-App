<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLdrUserTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'id_outlet INT(11)',
			'nama VARCHAR(255)',
			'username VARCHAR(255)',
			'password VARCHAR(255)',
			'pajak INT(11)',
			'role ENUM("admin", "kasir", "owner")',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id_user', TRUE);
		$this->forge->createTable('ldr_user', TRUE);
	}
	
	public function down()
	{
		$this->forge->dropTable('ldr_user');
	}
}
