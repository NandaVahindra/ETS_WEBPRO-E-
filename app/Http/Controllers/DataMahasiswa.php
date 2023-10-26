<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa as ModelsDataMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataMahasiswa extends Controller
{
    function index(){

        $data = ModelsDataMahasiswa::all();
        return view('data_mahasiswa.index',['data'=>$data]);
    }

    function tambah(){
        return view('data_mahasiswa.tambah');
    }

    function edit($id){
        $data = ModelsDataMahasiswa::find($id);

        return view('data_mahasiswa.edit',['data'=>$data]);
    }

    function hapus(Request $request){
        ModelsDataMahasiswa::where('id',$request->id)->delete();
        Session::flash('success','Data berhasil dihapus');

        return redirect('/datamahasiswa');
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'NRP' => 'required|max:8|unique:datamahasiswa,NRP',
            'Batch' => 'required|min:4|max:4',
            'Major' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'NRP.required' => 'NRP Wajib Di isi',
            'NRP.max' => 'NRP max 8 Digit',
            'NRP.unique' => 'NRP sudah digunakan',
            'Batch.required' => 'Angkatan Wajib Di isi',
            'Batch.min' => 'Masukan Tahun misal: 2022',
            'Batch.max' => 'Masukan Tahun misal: 2022',
            'Major.required' => 'Jurusan Wajib Di isi',
        ]);

        ModelsDataMahasiswa::insert([
            'name' => $request->name,
            'email' => $request->email,
            'NRP' => $request->NRP,
            'Batch' => $request->Batch,
            'Major' => $request->Major,
        ]);

        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/datamahasiswa')->with('success', 'Berhasil Menambahkan Data');
    }

    function change(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'NRP' => 'required|min:8|max:8|unique:datamahasiswa,NRP',
            'Batch' => 'required|min:4|max:4',
            'Major' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'NRP.required' => 'NRP Wajib Di isi',
            'NRP.max' => 'NRP max 8 Digit',
            'NRP.min' => 'NRP min 8 Digit',
            'NRP.unique' => 'NRP sudah digunakan',
            'Batch.required' => 'Angkatan Wajib Di isi',
            'Batch.min' => 'Masukan Tahun misal: 2022',
            'Batch.max' => 'Masukan Tahun misal: 2022',
            'Major.required' => 'Jurusan Wajib Di isi',
        ]);

        $datamahasiswa = ModelsDataMahasiswa::find($request->id);

        $datamahasiswa->name = $request->name;
        $datamahasiswa->email = $request->email;
        $datamahasiswa->NRP = $request->NRP;
        $datamahasiswa->Batch = $request->Batch;
        $datamahasiswa->Major = $request->Major;
        $datamahasiswa->save();
        
        Session::flash('success', 'Berhasil Mengubah Data');

        return redirect('/datamahasiswa');
    }


}
