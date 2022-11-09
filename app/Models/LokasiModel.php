<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table      = 'tab_lokasi_menara';
    protected $allowedFields = ['provider_id', 'nama_menara', 'foto_menara', 'slug', 'alamat', 'latitude', 'longitude', 'judul', 'detailsurvey'];

    public function sesuai_provider($id)
    {
        return $this->where(['provider_id' => $id])->findAll();
    }

    public function map()
    {
        return $this->table('tab_lokasi_menara')->select('*')->join('tab_provider', 'tab_provider.id=tab_lokasi_menara.provider_id')->get()->getResultArray();
    }

    public function ambil_slug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function hapus($slug)
    {
        return $this->where(['slug' => $slug])->delete();
    }

    public function ambil_id($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
