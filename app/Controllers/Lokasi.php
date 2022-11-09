<?php

namespace App\Controllers;

use App\Models\LokasiModel;
use App\Models\ProviderModel;

class Lokasi extends BaseController
{

    protected $provider;
    protected $lokasi;

    public function __construct()
    {
        $this->provider = new ProviderModel();
        $this->lokasi = new LokasiModel();
    }

    public function index($slug)
    {
        $ambil_id_provider = $this->provider->ambil_slug($slug);

        $id_provider = $ambil_id_provider['id'];
        $nama_provider = $ambil_id_provider['nama_provider'];
        $slug_provider = $ambil_id_provider['slug'];

        $data = [
            'title' => 'Lokasi Menara - siMENTEL-Sergai',
            'namaprovider' => $nama_provider,
            'slugprovider' => $slug_provider,
            'menara' => $this->lokasi->sesuai_provider($id_provider)
        ];

        return view('admin/lokasi-menara/lokasi', $data);
    }

    public function tambah_menara($slug)
    {
        $ambil_id_provider = $this->provider->ambil_slug($slug);
        $id_provider = $ambil_id_provider['id'];
        $slug_provider = $ambil_id_provider['slug'];

        $data = [
            'title' => 'Tambah Lokasi Menara',
            'id' => $id_provider,
            'slugprovider' => $slug_provider,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/lokasi-menara/tambah-lokasi', $data);
    }

    public function simpan_menara()
    {

        $id_provider = $this->request->getPost('id');

        $ambil_id_provider = $this->provider->cari_id($id_provider);

        // dd($ambil_id_provider);
        $slug_provider = $ambil_id_provider['slug'];

        $slug_menara = url_title($this->request->getVar('nama_menara'), '-', true);

        $FileFoto = $this->request->getFile('foto_menara');
        if ($FileFoto == "") {
            $NamaFile = "default_menara.png";
        } else {
            $NamaFile = $FileFoto->getRandomName();
            $FileFoto->move('assets/img', $NamaFile);
        }

        // form validasi
        if (!$this->validate([
            'nama_menara' => [
                'rules' => 'required|is_unique[tab_lokasi_menara.nama_menara]',
                'errors' => [
                    'required' => 'Nama Menara Harus Diisi',
                    'is_unique' => 'Nama Menara Sudah Ada'
                ]
            ], 'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Menara Harus Diisi'
                ]
            ], 'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude Harus Diisi'
                ]
            ],  'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Longitude Harus Diisi'
                ]
            ]
        ])) {
            return redirect()->to('lokasi/tambah_menara/' . $slug_provider)->withInput();
        } else {

            $this->lokasi->insert([
                'provider_id' => $id_provider,
                'nama_menara' => $this->request->getVar('nama_menara'),
                'slug' => $slug_menara,
                'foto_menara' => $NamaFile,
                'alamat' => $this->request->getVar('alamat'),
                'latitude' => $this->request->getVar('latitude'),
                'longitude' => $this->request->getVar('longitude'),
            ]);

            return redirect()->to('lokasi/index/' . $slug_provider)->with('success', 'Data Telah Ditambahkan');
        }

        return redirect()->to('lokasi/index/' . $slug_provider)->with('danger', 'Data Gagal Ditambahkan');
    }

    public function ubah_menara($slug)
    {
        $data = [
            'title' => 'Edit Lokasi Menara',
            'menara' => $this->lokasi->ambil_slug($slug),
            'provider' => $this->provider->findAll()
        ];
        return view('admin/lokasi-menara/ubah-lokasi', $data);
    }

    public function update_data()
    {
        $id_provider = $this->request->getPost('id_provider');
        $id_menara = $this->request->getPost('id');

        $ambil_slug_menara = $this->lokasi->ambil_id($id_menara);
        $slug = $ambil_slug_menara['slug'];


        $ambil_id_provider = $this->provider->cari_id($id_provider);

        // dd($ambil_id_provider);
        $slug_provider = $ambil_id_provider['slug'];

        $slug_menara = url_title($this->request->getVar('nama_menara'), '-', true);

        $datalama = $this->lokasi->ambil_slug($slug);
        if ($this->request->getFile('foto_menara') == "") {
            $NamaFile = $datalama['foto_menara'];
        } else {
            if ($datalama['foto_menara'] == "default_menara.png") {
                $getFile = $this->request->getFile('foto_menara');
                $NamaFile = $getFile->getRandomName();
                $getFile->move('assets/img/', $NamaFile);
            } else {
                unlink('assets/img/' . $datalama['foto_menara']);
                $getFile = $this->request->getFile('foto_menara');
                $NamaFile = $getFile->getRandomName();
                $getFile->move('assets/img/', $NamaFile);
            }
        }

        // form validasi
        if (!$this->validate([
            'nama_menara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Menara Harus Diisi'
                ]
            ], 'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Menara Harus Diisi'
                ]
            ], 'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude Harus Diisi'
                ]
            ],  'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Longitude Harus Diisi'
                ]
            ]
        ])) {
            return redirect()->to('lokasi/tambah_menara/' . $slug_provider)->withInput();
        } else {

            $this->lokasi->save([
                'id' => $this->request->getPost('id'),
                'provider_id' => $id_provider,
                'nama_menara' => $this->request->getVar('nama_menara'),
                'slug' => $slug_menara,
                'foto_menara' => $NamaFile,
                'alamat' => $this->request->getVar('alamat'),
                'latitude' => $this->request->getVar('latitude'),
                'longitude' => $this->request->getVar('longitude'),
            ]);

            return redirect()->to('lokasi/index/' . $slug_provider)->with('success', 'Data Berhasil Diubah');
        }

        return redirect()->to('lokasi/index/' . $slug_provider)->with('danger', 'Data Gagal Diubah');
    }

    public function hapus_data($slug_menara)
    {
        $ambil_id_provider = $this->lokasi->ambil_slug($slug_menara);
        $id_provider = $ambil_id_provider['provider_id'];

        $ambil_slug_provider = $this->provider->cari_id($id_provider);
        $slug_provider = $ambil_slug_provider['slug'];

        $this->lokasi->hapus($slug_menara);
        return redirect()->to('lokasi/index/' . $slug_provider)->with('success', 'Data Berhasil DiHapus');
    }
}
