<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\ObjekPendapatanRepo;
use App\Http\Requests\admin\master\ObjekPendapatanRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ObjekPendapatan extends Controller
{
    protected ObjekPendapatanRepo $repo;

    public function __construct(ObjekPendapatanRepo $objekPendapatanRepo)
    {
        $this->repo=$objekPendapatanRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getAll();
    }

    public function save_data(ObjekPendapatanRequest $req):JsonResponse
    {
        return $this->repo->save($req);
    }

    public function update_data(ObjekPendapatanRequest $req,$id):JsonResponse
    {
        return $this->repo->update($req,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->delete($id);
    }
}
