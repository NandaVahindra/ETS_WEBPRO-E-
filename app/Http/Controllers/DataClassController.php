<?php

namespace App\Http\Controllers;

use App\Models\DataKelas;
use App\Models\DataMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataClassController extends Controller
{
    function index()
    {
        $data = DataKelas::all();
        return view("data_kelas/index", ['data'=>$data]);
    }

    function tambah()
    {
        return view('data_kelas/tambah');
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'hari' => 'required',
            'jam' => 'required',
            'ruangan' => 'required',
            'semester' => 'required',
            'tahunAjaran' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'hari.required' => 'hari Wajib Di isi',
            'jam.required' => 'jam Wajib Di isi',
            'ruangan.required' => 'Ruangan Wajib Di isi',
            'semester.required'=> 'Semester wajib diisi',
            'tahunAjaran.required' => 'Tahun Ajaran Wajib Di isi',
        ]);

        DataKelas::insert([
            'name' => $request->name,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'ruangan' => $request->ruangan,
            'semester' => $request->semester,
            'tahunAjaran' => $request->tahunAjaran,
        ]);

        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/manageclass')->with('success', 'Berhasil Menambahkan Data');
    }

    function hapus(Request $request){
        DataKelas::where('id',$request->id)->delete();
        Session::flash('success','Data berhasil dihapus');

        return redirect('/manageclass');
    }

    function edit($id){
        $data = DataKelas::find($id);

        return view('data_kelas.edit',['data'=>$data]);
    }
    function add($id){
        $data = DataKelas::find($id);

        return view('data_kelas.add',['data'=>$data]);
    }

    function change(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'hari' => 'required',
            'jam' => 'required',
            'ruangan' => 'required',
            'semester' => 'required',
            'tahunAjaran' => 'required',
        ], [
            'name.required' => 'Name Wajib Di isi',
            'name.min' => 'Bidang name minimal harus 3 karakter.',
            'hari.required' => 'hari Wajib Di isi',
            'jam.required' => 'jam Wajib Di isi',
            'ruangan.required' => 'Ruangan Wajib Di isi',
            'semester.required'=> 'Semester wajib diisi',
            'tahunAjaran.required' => 'Tahun Ajaran Wajib Di isi',
        ]);

        $datakelas = DataKelas::find($request->id);

        $datakelas->name = $request->name;
        $datakelas->hari = $request->hari;
        $datakelas->jam = $request->jam;
        $datakelas->ruangan = $request->ruangan;
        $datakelas->semester = $request->semester;
        $datakelas->tahunAjaran = $request->tahunAjaran;
        $datakelas->save();

        Session::flash('success', 'Berhasil Mengubah Data');

        return redirect('/manageclass');
    }

    function tambahmhs(Request $request)
    {
        $request->validate([
            'NRP' => 'required|exists:datamahasiswa,NRP',
        ], [
            'NRP.required' => 'NRP Wajib Di isi',
            'NRP.exists' => 'NRP tidak terdaftar',
        ]);

        $mahasiswa = DataMahasiswa::where('NRP', $request->NRP)->first();
        $kelas = DataKelas::where('id', $request->id)->first();
        
        $mahasiswa->kelas()->attach($kelas->id);

        Session::flash('success', 'Berhasil Menambahkan Data');

        return redirect('/manageclass');
    }

    function view($id){
        $data = DataKelas::find($id);
        $mahasiswa = $data->mahasiswa;
        return view('data_kelas.view',['data'=>$data, 'mahasiswa'=>$mahasiswa]);
    }
}
