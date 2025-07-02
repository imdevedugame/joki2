<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VideoModel;

class Video extends BaseController
{
    protected $videoModel;

    public function __construct()
    {
        $this->videoModel = new VideoModel();
    }

    public function index()
    {
        $data['video'] = $this->videoModel->findAll();
        return view('admin/video', $data);
    }

    public function create()
    {
        return view('admin/video_create');
    }

    public function store()
    {
        $this->videoModel->save([
            'judul' => $this->request->getPost('judul'),
            'url'   => $this->request->getPost('url'),
        ]);

        return redirect()->to('/admin/video');
    }

    public function edit($id)
    {
        $data['video'] = $this->videoModel->find($id);
        return view('admin/video_edit', $data);
    }

    public function update($id)
    {
        $this->videoModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'url'   => $this->request->getPost('url'),
        ]);

        return redirect()->to('/admin/video');
    }

    public function delete($id)
    {
        $this->videoModel->delete($id);
        return redirect()->to('/admin/video');
    }
}
