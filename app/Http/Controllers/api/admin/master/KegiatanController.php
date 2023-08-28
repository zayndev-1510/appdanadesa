<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\KegiatanRepo;
use App\Http\Requests\admin\master\KegiatanRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    protected KegiatanRepo $repo;

    public function __construct(KegiatanRepo $kegiatanRepo)
    {
        $this->repo = $kegiatanRepo;
    }

    public function get_data(): JsonResponse
    {
        return $this->repo->getData();
    }

    public function save_data(KegiatanRequest $kegiatanRequest): JsonResponse
    {
        return $this->repo->saveData($kegiatanRequest);
    }

    public function update_data(KegiatanRequest $kegiatanRequest, $id): JsonResponse
    {
        return $this->repo->updateData($kegiatanRequest, $id);
    }

    public function delete_data($id): JsonResponse
    {
        return $this->repo->deleteData($id);
    }
}
