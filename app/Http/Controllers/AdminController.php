<?php

namespace App\Http\Controllers;
use App\Models\DataMahasiswa;
use App\Models\User;
use App\Models\DataKelas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $totalStudents = DataMahasiswa::count();
        $totalClasses = DataKelas::count();
        $totalUsers = User::count();
        return view('pointakses/admin/index', compact('totalStudents','totalClasses','totalUsers'));
    }
}
