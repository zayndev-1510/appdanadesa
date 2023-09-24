<?php

namespace App\Http\Controllers\api\admin\master\anggaran;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\penganggaran\KegiatanAnggaranRepo;
use App\Http\Requests\admin\master\anggaran\KegiatanAnggaranRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KegiatanAnggaranController extends Controller
{
    protected KegiatanAnggaranRepo $repo;

    public function __construct(KegiatanAnggaranRepo $kegiatanAnggaranRepo)
    {
        $this->repo=$kegiatanAnggaranRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getData();
    }

    public function get_tahun_anggaran():JsonResponse
    {
        return $this->repo->getTahunAnggaran();
    }

    public function save_data(KegiatanAnggaranRequest $req):JsonResponse
    {
        return $this->repo->saveData($req);
    }

    public function update_data(KegiatanAnggaranRequest $req,$id):JsonResponse
    {
        return $this->repo->updateData($req,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->deleteData($id);
    }
}
