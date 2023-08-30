<?php

namespace Database\Factories\Src\Products\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Families\Domain\Model\Family;
use Src\Products\Domain\Model\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Product::class;
    public function definition(): array
    {
        return [
            // Relacionado con una Familia ficticia
            'familia_id' => Family::factory()->create()->id,
            'nombre' => $this->faker->name(),
            'url_foto' => $this->faker->imageUrl(), // URL de la foto (puede ajustarse según tus necesidades)
            'comentarios' => $this->faker->text(),
        ];
    }
}
