<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\SubBidangRepo;
use App\Http\Requests\admin\master\SubBidangRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubBidangController extends Controller
{
    /**
     * Summary of repo
     * @var SubBidangRepo
     */
    protected SubBidangRepo $repo;

    /**
     * Summary of __construct
     * @param \App\Http\Repository\admin\master\SubBidangRepo $subBidangRepo
     */
    public function __construct(SubBidangRepo $subBidangRepo)
    {
        $this->repo = $subBidangRepo;
    }

    /**
     * Summary of get_data
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_data(): JsonResponse
    {
        return $this->repo->getData();
    }

    /**
     * Summary of save_data
     * @param \App\Http\Requests\admin\master\SubBidangRequest $subBidangRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function save_data(SubBidangRequest $subBidangRequest): JsonResponse
    {
        return $this->repo->saveData($subBidangRequest);
    }

    /**
     * Summary of update_data
     * @param \App\Http\Requests\admin\master\SubBidangRequest $subBidangRequest
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_data(SubBidangRequest $subBidangRequest, $id): JsonResponse
    {
        return $this->repo->updateData($subBidangRequest, $id);
    }

    /**
     * Summary of delete_data
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_data($id): JsonResponse
    {
        return $this->repo->deleteData($id);
    }
}
