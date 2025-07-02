<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Member extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_member' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'alamat' => [
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

        $this->forge->addKey('id_member', true);
        $this->forge->createTable('member');
    }

    public function down()
    {
        $this->forge->dropTable('member');
    }
}
