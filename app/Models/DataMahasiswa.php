<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    use HasFactory;
    public $table = 'datamahasiswa';
    public $filltable = [
        'name',
        'email',
        'NRP',
        'Batch',
        'Major',
    ];

    public function kelas()
    {
        return $this->belongsToMany(DataKelas::class, 'class_student', 'mahasiswa_id', 'kelas_id');
    }
}
