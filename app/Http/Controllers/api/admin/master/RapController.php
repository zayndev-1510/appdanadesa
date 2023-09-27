<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\RapRepo;
use App\Http\Requests\admin\master\RapRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RapController extends Controller
{
    protected RapRepo $repo;

    public function __construct(RapRepo $rapRepo)
    {
        $this->repo=$rapRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getAll();
    }

    public function save_data(RapRequest $req):JsonResponse
    {
        return $this->repo->save($req);
    }

    public function update_data(RapRequest $req,$id):JsonResponse
    {
        return $this->repo->update($req,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->delete($id);
    }
}
