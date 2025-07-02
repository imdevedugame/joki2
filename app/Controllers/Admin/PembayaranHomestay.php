<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PembayaranHomestayModel;

class PembayaranHomestay extends BaseController
{
    /**
     * Menampilkan semua data pembayaran homestay
     */
    public function index()
    {
        $model = new PembayaranHomestayModel();
        $data['pembayaran'] = $model->findAll();

        return view('admin/pembayaranhomestay', $data);
    }

    /**
     * Menampilkan detail pembayaran homestay berdasarkan ID
     */
    public function detail($id)
    {
        $model = new PembayaranHomestayModel();
        $data['pembayaran'] = $model->find($id);

        if (!$data['pembayaran']) {
            return redirect()->to('/admin/pembayaranhomestay')->with('error', 'Data pembayaran homestay tidak ditemukan.');
        }

        return view('admin/pembayaranhomestay_detail', $data);
    }

    /**
     * Mengkonfirmasi pembayaran homestay: mengubah status + tanggal bayar
     */
    public function konfirmasi($id)
    {
        $model = new PembayaranHomestayModel();
        $pembayaran = $model->find($id);

        if (!$pembayaran) {
            return redirect()->to('/admin/pembayaranhomestay')->with('error', 'Data pembayaran homestay tidak ditemukan.');
        }

        $model->update($id, [
            'status' => 'Diterima',
            'tanggal_bayar' => date('Y-m-d'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/pembayaranhomestay')->with('success', 'Pembayaran homestay berhasil dikonfirmasi.');
    }
}
