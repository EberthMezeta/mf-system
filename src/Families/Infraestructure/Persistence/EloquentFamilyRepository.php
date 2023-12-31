<?php

namespace Src\Families\Infraestructure\Persistence;

use Src\Families\Domain\Model\Family;
use Src\Families\Domain\Repository\FamilyRepositoryInterface;

class EloquentFamilyRepository implements FamilyRepositoryInterface
{
    public function create(array $data)
    {
        return Family::create($data);
    }

    public function read(int $id)
    {
        return Family::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $family = Family::findOrFail($id);
        if ($family) {
            $family->update($data);
        }
        return $family;
    }

    public function delete(int $id)
    {
        $family = Family::findOrFail($id);
        if ($family) {
            $family->delete();
        }
    }
}
