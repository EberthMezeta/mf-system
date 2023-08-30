<?php

namespace Database\Factories\Src\Families\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Families\Domain\Model\Family;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FamilyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Family::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'comentarios' => fake()->text()
        ];
    }
}
