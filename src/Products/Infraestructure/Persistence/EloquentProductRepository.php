<?php

namespace Src\Products\Infraestructure\Persistence;

use Src\Products\Domain\Model\Product;
use Src\Products\Domain\Repository\ProductRepositoryInterface;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(int $id, array $data)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->update($data);
        }
        return $product;
    }

    public function delete(int $id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->delete();
        }
    }

    public function read(int $id)
    {
        return Product::findOrFail($id);
    }
}
