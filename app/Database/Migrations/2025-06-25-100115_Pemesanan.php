<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemesanan' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'id_member' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'id_paket' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'jumlah_orang' => [
                'type' => 'INT'
            ],
            'total_bayar' => [
                'type' => 'INT'
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'bukti_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id_pemesanan', true);
        $this->forge->createTable('pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}
