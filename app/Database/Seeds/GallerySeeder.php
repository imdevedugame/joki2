<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Pemandangan Alam Desa',
                'gambar' => 'galeri1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Kegiatan Budaya',
                'gambar' => 'galeri2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('gallery')->insertBatch($data);
    }
}
