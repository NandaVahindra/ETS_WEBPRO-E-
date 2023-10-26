<?php

namespace Database\Factories;

use App\Models\DataKelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataKelas>
 */
class DataKelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $room =['A', 'B', 'C', 'D','E','F','G','H','I','J'];
        $jam = ['07:00 - 09:00', '10:00 - 12:00' , '13:00 - 15:00', '16:00 - 18:00'];
        $day = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $class = ['Computer Graphic', 'Web Programming', 'Linear Algebra', 'Framework Programming', 'Mobile Programming', 'Artificial Intelligence'];
        $tahun = ['2019/2020', '2020/2021' , '2021/2022', '2022/2023'];
        return [
            'name' => $this->faker->randomElement($class) . '(' . $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F']) . ')',
            'hari' => $this->faker->randomElement($day),
            'jam'  => $this->faker->randomElement($jam),
            'ruangan' => $this->faker->randomElement($room),
            'semester' => $this->faker->numberBetween(1,8),
            'tahunAjaran' => $this->faker->randomElement($tahun),
        ];
    }
}
