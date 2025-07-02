<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaketWisata extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_paket' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama_paket' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'deskripsi' => [
                'type' => 'TEXT'
            ],
            'harga' => [
                'type' => 'INT'
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255
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

        $this->forge->addKey('id_paket', true);
        $this->forge->createTable('paket_wisata');
    }

    public function down()
    {
        $this->forge->dropTable('paket_wisata');
    }
}
