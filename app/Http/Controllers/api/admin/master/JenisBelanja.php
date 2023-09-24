<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\JenisBelanjaRepo;
use App\Http\Requests\admin\master\JenisBelanjaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JenisBelanja extends Controller
{
    protected JenisBelanjaRepo $repo;

    public function __construct(JenisBelanjaRepo $jenisBelanja)
    {
        $this->repo = $jenisBelanja;
    }

    public function get_all(): JsonResponse
    {
        return $this->repo->getAll();
    }

    public function save_data(JenisBelanjaRequest $req): JsonResponse
    {
        return $this->repo->save($req);
    }

    public function update_data(JenisBelanjaRequest $req, $id): JsonResponse
    {
        return $this->repo->update($req,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->delete($id);
    }
}
