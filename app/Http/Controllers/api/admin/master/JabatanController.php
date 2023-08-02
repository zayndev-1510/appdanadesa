<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\Jabatanrepo;
use App\Http\Requests\admin\master\JabatanRequest;

class JabatanController extends Controller
{

    /**
     * Summary of jabatanrepo
     * @var Jabatanrepo
     */
    protected JabatanRepo $jabatanrepo;
    /**
     * Summary of __construct
     * @param \App\Http\Repository\admin\master\Jabatanrepo $repo
     */
    public function __construct(Jabatanrepo $repo){
        $this->jabatanrepo=$repo;
    }
    /**
     * Summary of get_data
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function get_data()
    {
        return $this->jabatanrepo->getData();
    }

    /**
     * Summary of save_data
     * @param \App\Http\Requests\admin\master\JabatanRequest $jabatanRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function save_data(JabatanRequest $jabatanRequest)
    {
        return $this->jabatanrepo->saveData($jabatanRequest);
    }

    /**
     * Summary of update_data
     * @param \App\Http\Requests\admin\master\JabatanRequest $jabatanRequest
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function update_data(JabatanRequest $jabatanRequest,$id)
    {
        return $this->jabatanrepo->updateData($jabatanRequest,$id);
    }

    /**
     * Summary of delete_data
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function delete_data($id)
    {
        return $this->jabatanrepo->deleteData($id);
    }
}

