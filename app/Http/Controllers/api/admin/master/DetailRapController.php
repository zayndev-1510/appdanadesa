<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\DetailRapRepo;
use App\Http\Requests\admin\master\DetailRapRequest;
use Illuminate\Http\JsonResponse;

class DetailRapController extends Controller
{
    protected DetailRapRepo $repo;

    public function __construct(DetailRapRepo $detailRapRepo)
    {
        $this->repo=$detailRapRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getAll();
    }

    public function save_data(DetailRapRequest $req):JsonResponse
    {
        return $this->repo->save($req);
    }

    public function update_data(DetailRapRequest $req,$id):JsonResponse
    {
        return $this->repo->update($req,$id);
    }

    public function delete($id):JsonResponse
    {
        return $this->repo->delete($id);
    }

    public function check_nomor_urut($id):JsonResponse
    {
        return $this->repo->checkNomor($id);
    }
}
