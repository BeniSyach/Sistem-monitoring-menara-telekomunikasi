<?php

namespace App\Controllers;

use App\Models\RetribusiModel;

class Retribusi extends BaseController
{
    protected $retribusi;

    public function __construct()
    {
        $this->retribusi = new RetribusiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Menu Retribusi - siMENTEL-Sergai',
            'retri' => $this->retribusi->findAll()
        ];

        return view('admin/retribusi/retribusi', $data);
    }

    public function tambah_retribusi()
    {
        $data = [
            'title' => 'Tambah Retribusi - siMENTEL-Sergai'
        ];

        return view('admin/retribusi/tambah-retribusi', $data);
    }

    public function simpan_data()
    {
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->retribusi->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'tahun' => $this->request->getVar('tahun'),
            'detail_retribusi' => $this->request->getVar('detail_retribusi')
        ]);
        return redirect()->to('retribusi')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit_retribusi($slug)
    {

        $data = [
            'title' => 'Edit Retribusi - siMENTEL-Sergai',
            'retri' => $this->retribusi->ambil_slug($slug),
        ];

        return view('admin/retribusi/edit-retribusi', $data);
    }

    public function edit_data()
    {

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->retribusi->save([
            'id' => $this->request->getVar('id'),
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'tahun' => $this->request->getVar('tahun'),
            'detail_retribusi' => $this->request->getVar('detail_retribusi')
        ]);
        return redirect()->to('retribusi')->with('success', 'Data Berhasil Diubah');
    }

    public function hapus_retribusi($slug)
    {
        $this->retribusi->hapus_retribusi($slug);
        return redirect()->to('retribusi')->with('success', 'Data Berhasil Dihapus');
    }
}
