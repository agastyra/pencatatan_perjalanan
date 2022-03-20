<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perjalanan>
 */
class PerjalananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => 1,
            'tanggal' => $this->faker->date(),
            'tujuan' => $this->faker->words(3, true),
            'keperluan' => $this->faker->sentence(3),
            'suhu_tubuh' => 36,
            'slug' => 11 . '-' . $this->faker->date(),
        ];
    }
}
