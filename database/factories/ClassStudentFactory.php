<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kelas_id' => function () {
                return \App\Models\DataKelas::factory()->create()->id;
            },
            'mahasiswa_id' => function () {
                return \App\Models\DataMahasiswa::factory()->create()->id;
            },
        ];
    }
}