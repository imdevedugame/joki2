<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pemesanan' => 1,
                'metode'       => 'Transfer Bank',
                'bukti'        => 'bukti1.jpg',
                'status'       => 'Dikonfirmasi',
                'tanggal_bayar' => '2025-06-20',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_pemesanan' => 2,
                'metode'       => 'QRIS',
                'bukti'        => null,
                'status'       => 'Menunggu',
                'tanggal_bayar' => null,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('pembayaran')->insertBatch($data);
    }
}
