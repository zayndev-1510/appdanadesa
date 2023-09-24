<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\PolaKegiatanRepo;
use App\Http\Requests\admin\master\PolaKegiatanRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PolaKegiatanController extends Controller
{
    /**
     * Summary of polarepo
     * @var PolaKegiatanRepo
     */
    protected PolaKegiatanRepo $polarepo;

    /**
     * Summary of __construct
     * @param \App\Http\Repository\admin\master\PolaKegiatanRepo $polaKegiatanRepo
     */
    public function __construct(PolaKegiatanRepo $polaKegiatanRepo)
    {
        $this->polarepo=$polaKegiatanRepo;
    }

    /**
     * Summary of get_all
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_all():JsonResponse
    {
        return $this->polarepo->getAll();
    }

    /**
     * Summary of save_data
     * @param \App\Http\Requests\admin\master\PolaKegiatanRequest $polaKegiatanRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function save_data(PolaKegiatanRequest $polaKegiatanRequest):JsonResponse
    {
        return $this->polarepo->save($polaKegiatanRequest);
    }

    /**
     * Summary of update_data
     * @param \App\Http\Requests\admin\master\PolaKegiatanRequest $polaKegiatanRequest
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_data(PolaKegiatanRequest $polaKegiatanRequest,$id):JsonResponse
    {
        return $this->polarepo->update($polaKegiatanRequest,$id);
    }

    /**
     * Summary of delete_data
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_data($id):JsonResponse
    {
        return $this->polarepo->delete($id);
    }
}
