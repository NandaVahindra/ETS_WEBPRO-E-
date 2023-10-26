<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKelas;

class UserController extends Controller
{
    function index()
    {
        return view('pointakses/user/index');
    }

    function view()
    {
        $data = DataKelas::all();
        return view('pointakses/user/view',['data'=>$data]);
    }

    function class($id){
        $data = DataKelas::find($id);
        $mahasiswa = $data->mahasiswa;
        return view('pointakses/user/class',['data'=>$data, 'mahasiswa'=>$mahasiswa]);
    }

}
