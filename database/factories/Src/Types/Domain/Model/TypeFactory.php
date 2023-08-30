<?php

namespace Database\Factories\Src\Types\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Types\Domain\Model\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


     protected $model = Type::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'comentarios' => fake()->text()
        ];
    }
}
