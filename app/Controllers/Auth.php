<?php

namespace App\Controllers;

require_once ROOTPATH . 'vendor/autoload.php';

use App\Models\MemberModel;
use \Google\Client as Google_Client;
use \Google\Service\Oauth2 as Google_Service_Oauth2;
use Config\Google;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginSubmit()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $memberModel = new MemberModel();
        $user = $memberModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'member_id' => $user['id_member'],
                'nama'      => $user['nama_lengkap'],
                'logged_in' => true
            ]);
            return redirect()->to('/')->with('success', 'Berhasil login.');
        }

        return redirect()->to('/login')->with('error', 'Email atau password salah.');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerSubmit()
    {
        $memberModel = new MemberModel();
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email'        => $this->request->getPost('email'),
            'password'     => $this->request->getPost('password'), // tidak perlu hash manual
            'no_hp'        => $this->request->getPost('no_hp'),
            'alamat'       => $this->request->getPost('alamat'),
        ];

        $memberModel->save($data);

        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }

    public function googleLogin()
    {
        $google = new Google();
        $client = new Google_Client();
        $client->setClientId($google->clientID);
        $client->setClientSecret($google->clientSecret);
        $client->setRedirectUri($google->redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        return redirect()->to($client->createAuthUrl());
    }

    public function googleCallback()
    {
        $google = new Google();
        $client = new Google_Client();
        $client->setClientId($google->clientID);
        $client->setClientSecret($google->clientSecret);
        $client->setRedirectUri($google->redirectUri);

        if ($this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));
            if (!isset($token['error'])) {
                $client->setAccessToken($token['access_token']);

                $google_oauth = new Google_Service_Oauth2($client);
                $google_account = $google_oauth->userinfo->get();

                $memberModel = new MemberModel();
                $user = $memberModel->where('email', $google_account->email)->first();

                if (!$user) {
                    $randomPassword = bin2hex(random_bytes(8)); // password dummy random

                    $memberModel->save([
                        'nama_lengkap' => $google_account->name,
                        'email'        => $google_account->email,
                        'password'     => $randomPassword, // biarkan dihash oleh beforeInsert
                        'no_hp'        => '-',
                        'alamat'       => '-'
                    ]);

                    $user = $memberModel->where('email', $google_account->email)->first();
                }

                session()->set([
                    'member_id' => $user['id_member'],
                    'nama'      => $user['nama_lengkap'],
                    'logged_in' => true
                ]);

                return redirect()->to('/')->with('success', 'Login Google berhasil.');
            }
        }

        return redirect()->to('/login')->with('error', 'Login dengan Google gagal.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout.');
    }
}
