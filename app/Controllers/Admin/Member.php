<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Member extends BaseController
{
    public function index()
    {
        // Tampilkan daftar member yang terdaftar
        return view('admin/member');
    }

    public function detail($id)
    {
        // Tampilkan detail member
        return view('admin/member_detail');
    }

    public function delete($id)
    {
        // Proses penghapusan member
        // logika penghapusan akan ditambahkan kemudian
        return redirect()->to('/admin/member')->with('success', 'Member berhasil dihapus');
    }
}
