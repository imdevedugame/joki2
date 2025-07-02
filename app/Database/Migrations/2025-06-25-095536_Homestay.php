<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Homestay extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_homestay' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'nama_homestay' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'deskripsi' => [
                'type' => 'TEXT'
            ],
            'harga_per_malam' => [
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

        $this->forge->addKey('id_homestay', true);
        $this->forge->createTable('homestay');
    }

    public function down()
    {
        $this->forge->dropTable('homestay');
    }
}
