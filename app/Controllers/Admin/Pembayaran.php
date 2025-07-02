<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PembayaranModel;

class Pembayaran extends BaseController
{
    /**
     * Menampilkan semua data pembayaran wisata
     */
    public function index()
    {
        $model = new PembayaranModel();
        $data['pembayaran'] = $model->findAll();

        return view('admin/pembayaran', $data);
    }

    /**
     * Menampilkan detail pembayaran wisata berdasarkan ID
     */
    public function detail($id)
    {
        $model = new PembayaranModel();
        $data['pembayaran'] = $model->find($id);

        if (!$data['pembayaran']) {
            return redirect()->to('/admin/pembayaran')->with('error', 'Data pembayaran tidak ditemukan.');
        }

        return view('admin/pembayaran_detail', $data);
    }

    /**
     * Mengkonfirmasi pembayaran wisata: mengubah status + tanggal bayar + updated_at
     */
    public function konfirmasi($id)
    {
        $model = new PembayaranModel();
        $pembayaran = $model->find($id);

        if (!$pembayaran) {
            return redirect()->to('/admin/pembayaran')->with('error', 'Data pembayaran tidak ditemukan.');
        }

        $model->update($id, [
            'status' => 'Dikonfirmasi',
            'tanggal_bayar' => date('Y-m-d'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran wisata berhasil dikonfirmasi.');
    }

    /**
     * Contoh function untuk menyimpan pembayaran wisata baru dengan tanggal bayar hari ini
     */
    public function simpan()
    {
        $model = new PembayaranModel();

        $data = [
            'id_pemesanan' => $this->request->getPost('id_pemesanan'),
            'metode' => $this->request->getPost('metode'),
            'bukti' => $this->request->getPost('bukti'), // sesuaikan dengan handling upload
            'status' => 'Menunggu',
            'tanggal_bayar' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran wisata berhasil ditambahkan.');
    }
}
