<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\PengaturanRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected PengaturanRepo $repo;

    public function __construct(PengaturanRepo $rep)
    {
        $this->repo=$rep;
    }

    public function get_all():JsonResponse
    {
        return $this->repo->getData();
    }

    public function update_data(Request $request):JsonResponse
    {
        return $this->repo->updateData($request);
    }
}
