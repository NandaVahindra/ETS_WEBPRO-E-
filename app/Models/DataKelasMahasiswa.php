<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelasMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'class_student';

    protected $fillable = [
        'kelas_id',
        'mahasiswa_id',
        // tambahkan kolom lain sesuai kebutuhan
    ];

    public function kelas()
    {
        return $this->belongsTo(DataKelas::class, 'kelas_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(DataMahasiswa::class, 'mahasiswa_id');
    }
}