<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Video Wisata Air Terjun',
                'url' => 'https://www.youtube.com/watch?v=abc123',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Tradisi Budaya Desa',
                'url' => 'https://www.youtube.com/watch?v=xyz456',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('video')->insertBatch($data);
    }
}
