<?php

namespace App\Controllers;

use App\Models\LokasiModel;
use App\Models\ProviderModel;
use App\Models\SurveyModel;

class Survey extends BaseController
{

    protected $provider;
    protected $lokasi;
    protected $survey;

    public function __construct()
    {
        $this->provider = new ProviderModel();
        $this->lokasi = new LokasiModel();
        $this->survey = new SurveyModel();
    }

    public function index($slug)
    {
        $ambil_id_provider = $this->provider->ambil_slug($slug);

        $id_provider = $ambil_id_provider['id'];
        $nama_provider = $ambil_id_provider['nama_provider'];
        $slug_provider = $ambil_id_provider['slug'];

        $data = [
            'title' => 'Survey Pengawasan Menara - siMENTEL-Sergai',
            'namaprovider' => $nama_provider,
            'slugprovider' => $slug_provider,
            'menara' => $this->lokasi->sesuai_provider($id_provider)
        ];

        return view('admin/survey-pengawasan/survey', $data);
    }

    public function edit_survey($slug)
    {

        $ambil_id_menara = $this->lokasi->ambil_slug($slug);
        $id_menara = $ambil_id_menara['id'];
        $id_provider = $ambil_id_menara['provider_id'];



        $data = [
            'title' => 'Edit Survey Pengawasan - siMENTEL Sergai',
            'survey' => $ambil_id_menara

        ];

        return view('admin/survey-pengawasan/edit-survey', $data);
    }

    public function edit_data()
    {
        $id_provider = $this->request->getVar('id_provider');

        $ambil_id_provider = $this->provider->cari_id($id_provider);
        $slug_provider = $ambil_id_provider['slug'];

        $this->lokasi->save([
            'id' => $this->request->getPost('id'),
            'judul' => $this->request->getVar('judul'),
            'detailsurvey' => $this->request->getVar('detailsurvey')
        ]);
        return redirect()->to('survey/index/' . $slug_provider)->with('success', 'Data Berhasil Diubah');
    }

    public function tambah_survey($slug)
    {
        $ambil_id_menara = $this->lokasi->ambil_slug($slug);
        $id_menara = $ambil_id_menara['id'];
        $id_provider = $ambil_id_menara['provider_id'];

        $data = [
            'title' => 'Tambah Survey - siMENTEL Sergai',
            'id_provider' => $id_provider,
            'id_menara' => $id_menara,
        ];

        return view('admin/survey-pengawasan/tambah-survey', $data);
    }

    public function simpan_data()
    {

        $id_provider = $this->request->getVar('id_provider');
        $id_menara = $this->request->getVar('id_menara');

        $ambil_id_provider = $this->provider->cari_id($id_provider);
        $slug_provider = $ambil_id_provider['slug'];

        $ambil_yang_ada = $this->survey->cari_id($id_menara);

        $id_yang_ada = $ambil_yang_ada['menara_id'];

        if ($id_menara != $id_yang_ada) {
            $this->survey->save([
                'menara_id' => $this->request->getVar('id_menara'),
                'provider_id' => $this->request->getVar('id_provider'),
                'judul' => $this->request->getVar('judul'),
                'detailsurvey' => $this->request->getVar('detailsurvey')
            ]);
            return redirect()->to('survey/index/' . $slug_provider)->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->to('survey/index/' . $slug_provider)->with('danger', 'Data Gagal Disimpan');
        }
    }
}
