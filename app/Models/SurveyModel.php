<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class SurveyModel extends Model
{
    protected $table      = 'tab_survey';
    protected $allowedFields = ['menara_id', 'provider_id', 'slug', 'detail_survey'];

    public function ambil_slug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }
    public function cari_id($id)
    {
        return $this->where(['menara_id' => $id])->first();
    }
    public function cari_survey($id_menara, $id_provider)
    {
        return $this->table('tab_survey')->select('*')->where('menara_id ="' . $id_menara . '" and provider_id = "' . $id_provider . '"')->get()->getRowArray();
    }
}
