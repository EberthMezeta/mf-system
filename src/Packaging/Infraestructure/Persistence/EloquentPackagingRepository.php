<?php

namespace Src\Packaging\Infraestructure\Persistence;

use Src\Packaging\Domain\Model\Packaging;
use Src\Packaging\Domain\Repository\PackagingRepositoryInterface;

class EloquentPackagingRepository implements PackagingRepositoryInterface
{
    public function create(array $data)
    {
        return Packaging::create($data);
    }

    public function read(int $id)
    {
        return Packaging::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $packaging = Packaging::findOrFail($id);
        if ($packaging) {
            $packaging->update($data);
        }
        return $packaging;
    }

    public function delete(int $id)
    {
        $packaging = Packaging::findOrFail($id);
        if ($packaging) {
            $packaging->delete();
        }
    }
}
