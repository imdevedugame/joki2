<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Video extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_video' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'url' => [
                'type' => 'TEXT'
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

        $this->forge->addKey('id_video', true);
        $this->forge->createTable('video');
    }

    public function down()
    {
        $this->forge->dropTable('video');
    }
}
