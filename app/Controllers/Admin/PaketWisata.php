<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaketWisataModel;

class PaketWisata extends BaseController
{
    // Tampilkan semua data paket
    public function index()
    {
        $model = new PaketWisataModel();
        $data['paket'] = $model->findAll(); // Ambil semua data

        return view('admin/paketwisata', $data);
    }

    // Simpan data baru
    public function store()
    {
        $model = new PaketWisataModel();
        $file = $this->request->getFile('gambar');

        // Handle upload gambar
        $gambar = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambar = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/paket/', $gambar);
        }

        $model->insert([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'gambar' => $gambar
        ]);

        return redirect()->to('/admin/paketwisata')->with('success', 'Paket berhasil ditambahkan');
    }
    public function create()
    {
        return view('admin/paketwisata_create');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $model = new PaketWisataModel();
        $data['paket'] = $model->find($id);

        return view('admin/paketwisata_edit', $data);
    }

    // Update data
    public function update($id)
    {
        $model = new PaketWisataModel();
        $data = [
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga')
        ];

        // Cek apakah ada gambar baru
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambar = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/paket/', $gambar);
            $data['gambar'] = $gambar;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/paketwisata')->with('success', 'Paket berhasil diupdate');
    }

    // Hapus data
    public function delete($id)
    {
        $model = new PaketWisataModel();
        $model->delete($id);

        return redirect()->to('/admin/paketwisata')->with('success', 'Paket berhasil dihapus');
    }
}
