<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\ObjekBelanjaRepo;
use App\Http\Requests\admin\master\ObjekBelanjaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ObjekBelanja extends Controller
{
    protected ObjekBelanjaRepo $repo;

    public function __construct(ObjekBelanjaRepo $objekBelanjaRepo)
    {
        $this->repo = $objekBelanjaRepo;
    }

    public function get_all(): JsonResponse
    {
        return $this->repo->getAll();
    }
    
    public function save_data(ObjekBelanjaRequest $req): JsonResponse
    {
        return $this->repo->save($req);
    }

    public function update_data(ObjekBelanjaRequest $req, $id): JsonResponse
    {
        return $this->repo->update($req, $id);
    }

    public function delete_data($id): JsonResponse
    {
        return $this->repo->delete($id);
    }
}
