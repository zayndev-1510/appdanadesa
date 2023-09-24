<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\KelompokBelanjaRepo;
use App\Http\Requests\admin\master\KelompokBelanjaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KelompokBelanja extends Controller
{
    protected KelompokBelanjaRepo $repo;

    public function __construct(KelompokBelanjaRepo $kelompokBelanjaRepo)
    {
        $this->repo=$kelompokBelanjaRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getAll();
    }

    public function save_data(KelompokBelanjaRequest $kelompokBelanjaRequest):JsonResponse
    {
        return $this->repo->save($kelompokBelanjaRequest);
    }

    public function update_data(KelompokBelanjaRequest $kelompokBelanjaRequest,$id):JsonResponse
    {
        return $this->repo->update($kelompokBelanjaRequest,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->delete($id);
    }
}
