<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function lirepro(string $pro, string $id){
       $programe = Programme::find($id);
       $autres = Programme::orderBy('id', 'desc')->paginate(5)->where('id', '!=', $id);
       // dump($autres);
        return view('lireprogramme',['programme'=>$programe,'autres'=>$autres]);
    }
}
