<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\SumberdanaRepo;
use App\Http\Requests\admin\master\SumberdanaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SumberdanaController extends Controller
{
    protected SumberdanaRepo $sumberdanarepo;

    public function __construct(SumberdanaRepo $repo){
        $this->sumberdanarepo=$repo;
    }

    public function get_data() : JsonResponse{
        return $this->sumberdanarepo->getData();
    }

    public function save_data(SumberdanaRequest $sumberdanaRequest) : JsonResponse{
        return $this->sumberdanarepo->saveData($sumberdanaRequest);
    }

    public function update_data(SumberdanaRequest $sumberdanaRequest,$id) : JsonResponse{
        return $this->sumberdanarepo->updateData($sumberdanaRequest,$id);
    }

    public function delete_data($id) : JsonResponse{
        return $this->sumberdanarepo->deleteData($id);
    }
}
