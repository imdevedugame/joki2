<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index()
    {
        $model = new GalleryModel();
        $data['gallery'] = $model->findAll();
        return view('admin/gallery', $data);
    }

    public function create()
    {
        return view('admin/gallery_create');
    }

    public function store()
    {
        $model = new GalleryModel();
        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/gallery/', $namaGambar);
        }

        $model->insert([
            'judul' => $this->request->getPost('judul'),
            'gambar' => $namaGambar ?? null,
        ]);

        return redirect()->to('/admin/gallery');
    }
    public function edit($id)
    {
        $model = new GalleryModel();
        $data['gallery'] = $model->find($id);
        return view('admin/gallery_edit', $data);
    }

    public function update($id)
    {
        $model = new GalleryModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
        ];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/gallery/', $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/gallery')->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function delete($id)
    {
        $gallery = new \App\Models\GalleryModel();
        $item = $gallery->find($id);

        if ($item) {
            // Hapus file gambar jika ada
            if (file_exists('assets/images/' . $item['gambar'])) {
                unlink('assets/images/' . $item['gambar']);
            }

            $gallery->delete($id);
            return redirect()->to(base_url('admin/gallery'))->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/gallery'))->with('error', 'Data tidak ditemukan.');
    }
}
