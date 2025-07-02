<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PembayaranHomestay extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'id_pemesanan'    => ['type' => 'INT', 'unsigned' => true],
            'metode'          => ['type' => 'VARCHAR', 'constraint' => 50],
            'bukti'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'status'          => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'Menunggu'],
            'tanggal_bayar'   => ['type' => 'DATETIME', 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pembayaran_homestay');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran_homestay');
    }
}
