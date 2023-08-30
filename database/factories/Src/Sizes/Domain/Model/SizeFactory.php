<?php

namespace Database\Factories\Src\Sizes\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Sizes\Domain\Model\Size;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Size::class;
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'descripcion'  => fake()->name(),
            'comentarios' => fake()->text()
        ];
    }
}
