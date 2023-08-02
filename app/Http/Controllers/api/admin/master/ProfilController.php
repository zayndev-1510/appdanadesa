<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\ProfilDesaRepo;
use App\Http\Requests\admin\master\ProfildesaRequest;

class ProfilController extends Controller
{
    /**
     * Summary of profildesa
     * @var ProfilDesaRepo
     */
    protected ProfilDesaRepo $profildesa;

    /**
     * Summary of __construct
     * @param \App\Http\Repository\admin\master\ProfilDesaRepo $profilrepo
     */
    public function __construct(ProfilDesaRepo $profilrepo){
        $this->profildesa=$profilrepo;
    }

    /**
     * Summary of get_data_profil_desa
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_data_profil_desa(){
        return $this->profildesa->getProfilDesa();
    }

    /**
     * Summary of update_data_profil_desa
     * @param \App\Http\Requests\admin\master\ProfildesaRequest $profildesaRequest
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_data_profil_desa(ProfildesaRequest $profildesaRequest,$id){
        return $this->profildesa->updateProfilDesa($profildesaRequest,$id);
    }
}
