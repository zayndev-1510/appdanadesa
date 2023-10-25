<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\TahunAnggaranRepo;
use App\Http\Requests\admin\master\TahunRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TahunAnggaranController extends Controller
{
    protected TahunAnggaranRepo $tahunAnggaranRepo;

    public function __construct(TahunAnggaranRepo $tahunAnggaranRepo)
    {
        $this->tahunAnggaranRepo= $tahunAnggaranRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->tahunAnggaranRepo->getData();
    }

    public function save_data(TahunRequest $request): JsonResponse
    {
        return $this->tahunAnggaranRepo->saveData($request);
    }

    public function update_data(TahunRequest $request,int $id ):JsonResponse
    {
        return $this->tahunAnggaranRepo->updateData($request,$id);
    }

    public function delete_data(int $id):JsonResponse
    {
        return $this->tahunAnggaranRepo->deleteData($id);
    }
}
