<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\JenisPendapatanRepo;
use App\Http\Requests\admin\master\JenisPendapatanRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JenisPendapatan extends Controller
{
    protected JenisPendapatanRepo $repo;

    public function __construct(JenisPendapatanRepo $jenisPendapatanRepo)
    {
        $this->repo=$jenisPendapatanRepo;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getAll();
    }

    public function save_data(JenisPendapatanRequest $req):JsonResponse
    {
        return $this->repo->save($req);
    }

    public function update_data(JenisPendapatanRequest $req,$id):JsonResponse
    {
        return $this->repo->update($req,$id);
    }

    public function delete_data($id):JsonResponse
    {
        return $this->repo->delete($id);
    }
}
