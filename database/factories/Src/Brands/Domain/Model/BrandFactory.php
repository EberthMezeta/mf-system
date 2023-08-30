<?php

namespace Database\Factories\Src\Brands\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Brands\Domain\Model\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brand::class;
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'comentarios' => fake()->text()
        ];
    }
}
