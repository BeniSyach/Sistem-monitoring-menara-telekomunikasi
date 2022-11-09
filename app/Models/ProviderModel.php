<?php

namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model
{
    protected $table      = 'tab_provider';
    protected $allowedFields = ['nama_provider', 'slug', 'judul', 'detail'];

    public function ambil_slug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function delete_slug($slug)
    {
        return $this->where(['slug' => $slug])->delete();
    }

    public function menu_menara()
    {
        return $this->table('tab_provider')->select('tab_provider.nama_provider,tab_provider.id,tab_lokasi_menara.nama_menara,tab_lokasi_menara.provider_id,tab_lokasi_menara.slug')->join('tab_lokasi_menara', 'tab_lokasi_menara.provider_id=tab_provider.id')->get()->getResultArray();
    }

    public function cari_id($id_provider)
    {
        return $this->where(['id' => $id_provider])->first();
    }
}
