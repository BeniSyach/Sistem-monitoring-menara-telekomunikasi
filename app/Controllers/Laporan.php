<?php

namespace App\Controllers;

use App\Models\LokasiModel;
use App\Models\ProviderModel;

class Laporan extends BaseController
{
    protected $provider;
    protected $lokasi;

    public function __construct()
    {
        $this->provider = new ProviderModel();
        $this->lokasi = new LokasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Menara Di Kabupaten Serdang Bedagai - siMENTEL-Sergai',
            'menara' => $this->lokasi->map(),
        ];



        return view('admin/laporan/laporan', $data);
    }

    public function print()
    {
        $data = [
            'title' => 'Daftar Menara Di Kabupaten Serdang Bedagai - siMENTEL-Sergai',
            'menara' => $this->lokasi->map(),
        ];

        return view('admin/laporan/print', $data);
    }
}
