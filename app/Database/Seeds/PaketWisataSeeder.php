<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaketWisataSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_paket' => 'Paket Wisata Alam',
                'deskripsi' => 'Menjelajahi keindahan alam Desa Banjaran',
                'harga' => 150000,
                'gambar' => 'paket1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_paket' => 'Paket Wisata Budaya',
                'deskripsi' => 'Mengenal budaya lokal dan kegiatan masyarakat',
                'harga' => 200000,
                'gambar' => 'paket2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('paket_wisata')->insertBatch($data);
    }
}
