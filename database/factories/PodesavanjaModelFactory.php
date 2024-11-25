<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PodesavanjaModel>
 */
class PodesavanjaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firma' => '*',
            'drajver' => 'Microsoft Access Driver (*.mdb, *.accdb)',
            'putanja' => 'C:\\Ansoft\\backoffice\\G2024\\F1\\Backansoft.mdb',
            'email' => '',
        ];
    }
}
