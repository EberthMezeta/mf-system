<?php

namespace Database\Factories\Src\Presentations\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Presentations\Domain\Model\Presentation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PresentationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Presentation::class;
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'descripcion'  => fake()->name(),
            'comentarios' => fake()->text()
        ];
    }
}
