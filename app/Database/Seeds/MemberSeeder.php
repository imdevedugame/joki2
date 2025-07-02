<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Budi Santoso',
                'email'        => 'budi@example.com',
                'password'     => password_hash('123456', PASSWORD_DEFAULT),
                'no_hp'        => '08123456789',
                'alamat'       => 'Jl. Melati No. 123, Banjaran',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('member')->insertBatch($data);
    }
}
