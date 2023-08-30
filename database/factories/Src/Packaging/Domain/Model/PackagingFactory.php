<?php

namespace Database\Factories\Src\Packaging\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Packaging\Domain\Model\Packaging;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackagingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


     protected $model = Packaging::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'es_kilo' => $this->faker->boolean(),
            'comentarios' => $this->faker->text(),
        ];
    }
}
