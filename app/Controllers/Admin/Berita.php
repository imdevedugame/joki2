<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $data['berita'] = $this->beritaModel->findAll();
        return view('admin/berita', $data);
    }

    public function create()
    {
        return view('admin/berita_create');
    }

    public function store()
    {
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move('uploads/berita', $namaGambar);

        $this->beritaModel->save([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $namaGambar,
        ]);

        return redirect()->to('/admin/berita');
    }

    public function edit($id)
    {
        $data['berita'] = $this->beritaModel->find($id);
        return view('admin/berita_edit', $data);
    }

    public function update($id)
    {
        $dataLama = $this->beritaModel->find($id);
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/berita', $namaGambar);
            if (file_exists('uploads/berita/' . $dataLama['gambar'])) {
                unlink('uploads/berita/' . $dataLama['gambar']);
            }
        } else {
            $namaGambar = $dataLama['gambar'];
        }

        $this->beritaModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $namaGambar,
        ]);

        return redirect()->to('/admin/berita');
    }

    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);
        if (file_exists('uploads/berita/' . $berita['gambar'])) {
            unlink('uploads/berita/' . $berita['gambar']);
        }
        $this->beritaModel->delete($id);
        return redirect()->to('/admin/berita');
    }
}
