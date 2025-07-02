<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Festival Budaya Desa Banjaran',
                'isi' => 'Festival budaya tahunan diadakan dengan berbagai atraksi kesenian tradisional.',
                'gambar' => 'festival.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Penanaman Pohon Serentak',
                'isi' => 'Warga desa melakukan penanaman pohon secara serentak di kawasan wisata.',
                'gambar' => 'penanaman.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('berita')->insertBatch($data);
    }
}
