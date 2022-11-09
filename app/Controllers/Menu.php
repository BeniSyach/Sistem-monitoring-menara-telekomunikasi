<?php

namespace App\Controllers;

use App\Models\ProviderModel;

class Menu extends BaseController
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new ProviderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Menu Provider - siMENTEL-Sergai',
            'isp' => $this->provider->findAll()
        ];

        return view('admin/menu-provider/menu', $data);
    }

    public function tambah_menu()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/menu-provider/tambah-menu')
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf Data Anda TIdak Dapat Di proses');
        }
    }

    public function simpan_menu()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            // form validasi
            $valid = $this->validate([
                'nama_provider' => [
                    'rules' => 'required|is_unique[tab_provider.nama_provider]',
                    'errors' => [
                        'required' => 'Nama Provider Harus Diisi',
                        'is_unique' => 'Nama Provider Sudah Terdaftar'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_provider' => $validation->getError('nama_provider'),
                    ]
                ];
            } else {
                $slug = url_title($this->request->getVar('nama_provider'), '-', true);
                $simpandata = [
                    'nama_provider' => $this->request->getVar('nama_provider'),
                    'slug' => $slug
                ];

                $this->provider->insert($simpandata);

                $msg = [
                    'sukses' => 'Menu Provider berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Anda TIdak Dapat Di proses');
        }
    }

    public function ubah_menu()
    {
        if ($this->request->isAJAX()) {

            $slug = $this->request->getVar('slug');

            $row = $this->provider->ambil_slug($slug);

            $data = [
                'id' => $row['id'],
                'slug' => $row['slug'],
                'nama_provider' => $row['nama_provider']
            ];

            $msg = [
                'sukses' => view('admin/menu-provider/ubah-menu', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function update_data()
    {
        if ($this->request->isAJAX()) {
            $slug = url_title($this->request->getVar('nama_provider'), '-', true);

            $simpandata = [
                'nama_provider' => $this->request->getVar('nama_provider'),
                'slug' => $slug
            ];

            $id = $this->request->getVar('id');
            $this->provider->update($id, $simpandata);

            $msg = [
                'sukses' => 'Menu berhasil di Ubah'
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf Data Anda TIdak Dapat Di proses');
        }
    }

    public function hapus_menu()
    {
        if ($this->request->isAJAX()) {
            $slug = $this->request->getVar('slug');

            $this->provider->delete_slug($slug);
        }


        $msg = [
            'sukses' => 'Menu Provider berhasil di hapus'
        ];

        echo json_encode($msg);
    }
}
