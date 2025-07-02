<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemesananHomestay extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemesanan_homestay' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'id_member' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'id_homestay' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
            ],
            'jumlah_orang' => [
                'type'       => 'INT',
                'constraint' => 3,
            ],
            'total_bayar' => [
                'type'       => 'BIGINT',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Menunggu Pembayaran',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('id_pemesanan_homestay', true);
        $this->forge->createTable('pemesanan_homestay');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan_homestay');
    }
}
