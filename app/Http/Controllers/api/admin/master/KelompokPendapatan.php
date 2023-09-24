<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\KelompokPendapatanRepo;
use App\Http\Requests\admin\master\KelompokPendapatanRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KelompokPendapatan extends Controller
{
    protected KelompokPendapatanRepo $repo;

    public function __construct(KelompokPendapatanRepo $kelompokPendapatan)
    {
        $this->repo=$kelompokPendapatan;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getAll();
    }

    public function save_data(KelompokPendapatanRequest $req):JsonResponse
    {
        return $this->repo->save($req);
    }

    public function update_data(KelompokPendapatanRequest $req,$id):JsonResponse
    {
        return $this->repo->update($req,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->delete($id);
    }
}
