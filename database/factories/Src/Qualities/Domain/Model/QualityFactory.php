<?php

namespace Database\Factories\Src\Qualities\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Qualities\Domain\Model\Quality;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QualityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Quality::class;
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'descripcion'  => fake()->name(),
            'comentarios' => fake()->text()
        ];
    }
}
