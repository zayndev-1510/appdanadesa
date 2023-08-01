<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\ProfilDesaRepo;
use App\Http\Requests\master\ProfildesaRequest;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    protected ProfilDesaRepo $profildesa;

    public function __construct(ProfilDesaRepo $profilrepo){
        $this->profildesa=$profilrepo;
    }

    public function get_data_profil_desa(){
        return $this->profildesa->getProfilDesa();
    }

    public function update_data_profil_desa(ProfildesaRequest $profildesaRequest,$id){
        return $this->profildesa->updateProfilDesa($profildesaRequest,$id);
    }
}
