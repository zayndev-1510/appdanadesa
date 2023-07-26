<?php

namespace App\Http\Controllers\api\admin\master;

use App\Http\Controllers\Controller;
use App\Http\Repository\admin\master\Jabatanrepo;
use App\Http\Requests\master\JabatanRequest;
use Illuminate\Http\Request;

class JabatanController extends Controller
{

    protected JabatanRepo $jabatanrepo;
    public function __construct(Jabatanrepo $repo){
        $this->jabatanrepo=$repo;
    }
    public function get_data()
    {
        return $this->jabatanrepo->getData();
    }

    public function save_data(JabatanRequest $jabatanRequest)
    {
        return $this->jabatanrepo->saveData($jabatanRequest);
    }

    public function update_data(JabatanRequest $jabatanRequest,$id)
    {
        return $this->jabatanrepo->updateData($jabatanRequest,$id);
    }

    public function delete_data($id)
    {
        return $this->jabatanrepo->deleteData($id);
    }
}

