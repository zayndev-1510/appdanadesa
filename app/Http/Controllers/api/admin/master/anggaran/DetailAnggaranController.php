<?php

namespace App\Http\Controllers\api\admin\master\anggaran;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\penganggaran\DetailAnggaranRepo;
use App\Http\Requests\admin\master\anggaran\DetailAnggaranRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DetailAnggaranController extends Controller
{
    protected DetailAnggaranRepo $repo;

    public function __construct(DetailAnggaranRepo $detailAnggaranRepo)
    {
        $this->repo=$detailAnggaranRepo;
    }

    public function get_all(int $id): JsonResponse{
        return $this->repo->getData($id);
    }

    public function save_data(DetailAnggaranRequest $req) : JsonResponse
    {
        return $this->repo->saveData($req);
    }

    public function update_data(DetailAnggaranRequest $req, int $id):JsonResponse
    {
        return $this->repo->updateData($req,$id);
    }

    public function delete_data(int $id):JsonResponse
    {
        return $this->repo->deleteData($id);
    }

    public function get_form():JsonResponse
    {
        return $this->repo->getForm();
    }

}
