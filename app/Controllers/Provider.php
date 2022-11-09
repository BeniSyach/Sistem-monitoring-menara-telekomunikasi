<?php

namespace App\Controllers;

use App\Models\ProviderModel;

class Provider extends BaseController
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new ProviderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Detail Provider',
            'isp' => $this->provider->findAll()
        ];

        return view('admin/provider/provider', $data);
    }

    public function edit_provider($slug)
    {
        $ambil_id_provider = $this->provider->ambil_slug($slug);

        $id_provider = $ambil_id_provider['id'];

        $data = [
            'title' => 'Edit Provider',
            'id' => $id_provider,
            'data_provider' => $this->provider->ambil_slug($slug)
        ];

        return view('admin/provider/edit-provider', $data);
    }

    public function edit()
    {
        $this->provider->save([
            'id' => $this->request->getPost('id'),
            'judul' => $this->request->getVar('judul'),
            'detail' => $this->request->getVar('detail')
        ]);
        // $data = ([
        //     'id' => $this->request->getPost('id'),
        //     'judul' => $this->request->getVar('judul'),
        //     'detail' => $this->request->getVar('detail')
        // ]);
        // dd($data);
        return redirect()->to('provider')->with('success', 'Data Berhasil Diubah');
    }
}
