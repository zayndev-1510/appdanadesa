<?php

namespace App\Http\Controllers\api\admin\master\rab;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\rab\RabDetailRepo;
use App\Http\Requests\admin\master\belanja\RabDetailRequest;
use Illuminate\Http\JsonResponse;

class RabDetailController extends Controller
{
    protected RabDetailRepo $repo;

    public function __construct(RabDetailRepo $repo)
    {
        $this->repo = $repo;
    }

    public function get_detail_rab(int $id): JsonResponse
    {
        return $this->repo->rabRinci($id);
    }

    public function save_data(RabDetailRequest $request): JsonResponse
    {
        return $this->repo->saveData($request);
    }

    public function update_data(RabDetailRequest $request,int $id): JsonResponse
    {
        return $this->repo->updateData($request, $id);
    }

    public function delete_data(int $id):JsonResponse
    {
        return $this->repo->deleteData($id);
    }
}
