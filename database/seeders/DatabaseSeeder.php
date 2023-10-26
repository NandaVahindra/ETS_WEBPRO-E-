<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DataMahasiswa;
use App\Models\DataKelas;
use Illuminate\Database\Seeder;
use App\Models\User;
use \Database\Factories\ClassStudentFactory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'Admin',
            'email' => 'admin@pweb.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'fullname' => 'TestUser',
            'email' => 'test@pweb.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'fullname' => 'TestUser2',
            'email' => 'test2@pweb.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
        ]);

        DataMahasiswa::factory(20)->create();
        DataKelas::factory(10)->create();
         // Seed the many-to-many relationship
         $kelasCount = DataKelas::count();
         $mahasiswaCount = DataMahasiswa::count();
 
         DataMahasiswa::all()->each(function ($mahasiswa) use ($kelasCount) {
             $kelasIds = DataKelas::inRandomOrder()->limit(rand(1, $kelasCount))->pluck('id');
             $mahasiswa->kelas()->attach($kelasIds);
    
    });
}
}
