<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLdrTransaksiTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_transaksi' => [
				'type' => 'INT',
				'auto_increment' => true,
			],
			'id_outlet INT(11)',
			'id_member INT(11)',
			'id_user INT(11)',
			'kode_invoice VARCHAR(255)',
			'status_bayar ENUM("dibayar", "belum_dibayar")',
			'status_pengerjaan ENUM("baru", "proses", "selesai", "diambil")',
			'biaya_tambahan INT(11)',
			'diskon DOUBLE',
			'pajak DOUBLE',
			'tgl_bayar DATETIME',
			'tgl_ambil DATETIME',
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id_transaksi', TRUE);
		$this->forge->createTable('ldr_transaksi', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('ldr_transaksi');
	}
}
