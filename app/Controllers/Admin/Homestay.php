<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HomestayModel;

class Homestay extends BaseController
{
    protected $homestay;

    public function __construct()
    {
        $this->homestay = new HomestayModel();
    }

    public function index()
    {
        $data['homestay'] = $this->homestay->findAll();
        return view('admin/homestay', $data);
    }

    public function create()
    {
        return view('admin/homestay_create');
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/homestay/', $fileName);
        } else {
            $fileName = null;
        }

        $this->homestay->save([
            'nama_homestay' => $this->request->getPost('nama_homestay'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga_per_malam' => $this->request->getPost('harga_per_malam'),
            'gambar' => $fileName
        ]);

        return redirect()->to('/admin/homestay');
    }

    public function edit($id)
    {
        $data['homestay'] = $this->homestay->find($id);
        return view('admin/homestay_edit', $data);
    }

    public function update($id)
    {
        $file = $this->request->getFile('gambar');
        $oldData = $this->homestay->find($id);
        $fileName = $oldData['gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/homestay/', $fileName);
        }

        $this->homestay->update($id, [
            'nama_homestay' => $this->request->getPost('nama_homestay'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga_per_malam' => $this->request->getPost('harga_per_malam'),
            'gambar' => $fileName
        ]);

        return redirect()->to('/admin/homestay');
    }

    public function delete($id)
    {
        $this->homestay->delete($id);
        return redirect()->to('/admin/homestay');
    }
}
