<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\Perangkatrepo;
use App\Http\Requests\master\PerangkatRequest;
use Illuminate\Http\Request;

/**
 * Summary of perangkatController
 * author by zayn
 */
class perangkatController extends Controller
{
    /**
     * Summary of perangkatrepo
     * @var
     */
    protected $perangkatrepo;

    /**
     * Summary of __construct
     * @param \App\Http\Repository\admin\master\Perangkatrepo $perangkatrepo
     */
    public function __construct(Perangkatrepo $perangkatrepo){
        $this->perangkatrepo=$perangkatrepo;
    }

    /**
     * Summary of get_data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function get_data(){
        return $this->perangkatrepo->getData();
    }

    /**
     * Summary of save_data
     * @param \App\Http\Requests\master\PerangkatRequest $perangkatRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function save_data(PerangkatRequest $perangkatRequest){
        return $this->perangkatrepo->saveData($perangkatRequest);
    }

    /**
     * Summary of update_data
     * @param \App\Http\Requests\master\PerangkatRequest $perangkat
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function update_data(PerangkatRequest $perangkat,$id){
        return $this->perangkatrepo->updateData($perangkat,$id);
    }

    /**
     * Summary of delete_data
     * @param mixed $id_perangkat
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function delete_data($id_perangkat){
        return $this->perangkatrepo->deleteData($id_perangkat);
    }
}
