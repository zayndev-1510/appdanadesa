<?php

namespace App\Http\Controllers\api\admin\master\rab;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\rab\RabRepo;
use App\Http\Requests\admin\master\belanja\RabRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RabController extends Controller
{
    protected RabRepo $repo;

    public function __construct(RabRepo $rabRepo)
    {
        $this->repo=$rabRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getData();
    }

    public function save_data(RabRequest $rabRequest):JsonResponse
    {
        return $this->repo->saveData($rabRequest);
    }

    public function update_data(RabRequest $rabRequest,$id):JsonResponse
    {
        return $this->repo->updateData($rabRequest,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->deleteData($id);
    }

    public function get_detail_kegiatan(int $id):JsonResponse
    {
        return $this->repo->detailKegiatan($id);
    }

}
