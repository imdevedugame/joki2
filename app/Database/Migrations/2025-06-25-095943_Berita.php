<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'isi' => [
                'type' => 'TEXT'
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

        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
