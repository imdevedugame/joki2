<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'nama_user' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default' => 'user'
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true]
        ]);

        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
