<?php

namespace App\Http\Controllers\errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class errorController extends Controller
{
    function error_500(){
        $value = session('value');
        // or
        $value = request()->session()->get('value');

       echo $value;
    }
}
