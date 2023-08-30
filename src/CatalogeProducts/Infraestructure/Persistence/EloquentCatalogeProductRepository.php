<?php

namespace Src\CatalogeProducts\Infraestructure\Persistence;

use Src\CatalogeProducts\Domain\Model\CatalogeProduct;
use Src\CatalogeProducts\Domain\Repository\CatalogeProductRepositoryInterface;

class EloquentCatalogeProductRepository implements CatalogeProductRepositoryInterface
{
    public function create(array $data)
    {
        return CatalogeProduct::create($data);
    }

    public function read(int $id)
    {
        return CatalogeProduct::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $catalogeProduct = CatalogeProduct::findOrFail($id);
        if ($catalogeProduct) {
            $catalogeProduct->update($data);
        }
        return $catalogeProduct;
    }

    public function delete(int $id)
    {
        $catalogeProduct = CatalogeProduct::findOrFail($id);
        if ($catalogeProduct) {
            $catalogeProduct->delete();
        }
    }
}
