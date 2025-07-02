<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function loginSubmit()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $admin = $userModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password']) && $admin['role'] === 'admin') {
            // ✅ Set session admin di sini:
            session()->set([
                'id_user'   => $admin['id_user'],
                'username'  => $admin['username'],
                'role'      => $admin['role'], // harus 'admin'
                'logged_in' => true
            ]);

            return redirect()->to('/admin');
        }

        return redirect()->to('/admin/login')->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
