<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_pemesanan' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'metode' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'bukti' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'tanggal_bayar' => [
                'type' => 'DATE',
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

        $this->forge->addKey('id_pembayaran', true);
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
