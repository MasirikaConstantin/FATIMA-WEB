<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function lirepro(string $pro, string $id){
       $programe = Programme::find($id);
        return view('lireprogramme',['programme'=>$programe]);
    }
}
