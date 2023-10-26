<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelas extends Model
{
    use HasFactory;
    public $table = 'data_kelas';
    public $filltable = [
        'name',
        'hari',
        'jam',
        'ruangan',
        'semester',
        'tahunAjaran',
    ];

    public function mahasiswa()
    {
        return $this->belongsToMany(DataMahasiswa::class, 'class_student', 'kelas_id', 'mahasiswa_id');
    }
}
