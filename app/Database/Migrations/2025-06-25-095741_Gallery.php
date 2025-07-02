<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gallery extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gallery' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 100
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

        $this->forge->addKey('id_gallery', true);
        $this->forge->createTable('gallery');
    }

    public function down()
    {
        $this->forge->dropTable('gallery');
    }
}
