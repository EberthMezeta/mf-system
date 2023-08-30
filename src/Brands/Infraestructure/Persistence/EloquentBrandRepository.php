<?php

namespace Src\Brands\Infraestructure\Persistence;

use Src\Brands\Domain\Model\Brand;
use Src\Brands\Domain\Repository\BrandRepositoryInterface;

class EloquentBrandRepository implements BrandRepositoryInterface
{
    public function create(array $data)
    {
        return Brand::create($data);
    }

    public function read(int $id)
    {
        return Brand::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $brand = Brand::findOrFail($id);
        if ($brand) {
            $brand->update($data);
        }
        return $brand;
    }

    public function delete(int $id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand) {
            $brand->delete();
        }
    }
}
