<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PemesananSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_member' => 1,
                'id_paket' => 1,
                'tanggal' => '2025-07-01',
                'jumlah_orang' => 5,
                'total_bayar' => 500000,
                'status' => 'Menunggu Pembayaran',
                'bukti_pembayaran' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_member' => 1,
                'id_paket' => 2,
                'tanggal' => '2025-07-10',
                'jumlah_orang' => 3,
                'total_bayar' => 300000,
                'status' => 'Sudah Bayar',
                'bukti_pembayaran' => 'bukti_transfer.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('pemesanan')->insertBatch($data);
    }
}
