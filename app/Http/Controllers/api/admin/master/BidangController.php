<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\BidangRepo;
use App\Http\Requests\admin\master\BidangRequest;
use Illuminate\Http\JsonResponse;

class BidangController extends Controller
{
    protected BidangRepo $bidangrepo;

    public function __construct(BidangRepo $repo)
    {
        $this->bidangrepo = $repo;
    }

    public function get_data() : JsonResponse
    {
        return $this->bidangrepo->getData();
    }

    public function save_data(BidangRequest $request) : JsonResponse
    {
        return $this->bidangrepo->saveData($request);
    }

    public function update_data(BidangRequest $request,$id) : JsonResponse
    {
        return $this->bidangrepo->updateData($request,$id);
    }

    public function delete_data($id) : JsonResponse
    {
        return $this->bidangrepo->deleteData($id);
    }
}
