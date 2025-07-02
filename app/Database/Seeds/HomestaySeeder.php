<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HomestaySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_homestay' => 'Homestay Mawar',
                'deskripsi' => 'Penginapan nyaman dengan suasana pedesaan.',
                'harga_per_malam' => 100000,
                'gambar' => 'homestay1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_homestay' => 'Homestay Melati',
                'deskripsi' => 'Dekat dengan lokasi wisata dan pasar tradisional.',
                'harga_per_malam' => 120000,
                'gambar' => 'homestay2.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('homestay')->insertBatch($data);
    }
}
