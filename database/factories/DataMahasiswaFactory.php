<?php

namespace Database\Factories;

use app\Models\DataMahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataMahasiswa>
 */
class DataMahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $majors = ['Computer Science', 'Electrical Engineering', 'Infomation System', 'Computer Engineering', 'Physics', 'Mathematics'];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'NRP' => $this->faker->unique()->numberBetween(50250001,50300000),
            'Batch'=> $this->faker->numberBetween(2019,2023),
            'Major' => $this->faker->randomElement($majors),
        ];
    }
}
