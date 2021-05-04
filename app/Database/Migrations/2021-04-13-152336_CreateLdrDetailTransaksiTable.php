<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLdrDetailTransaksiTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_detail' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'id_transaksi INT(11)',
			'id_paket INT(11)',
			'keterangan TEXT',
			'qty INT(255)',
			'harga_total INT(255)',
			'jumlah_bayar INT(255)',
			'kembalian INT(255)',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id_detail', TRUE);
		$this->forge->createTable('ldr_detail_transaksi', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('ldr_detail_transaksi');
	}
}
