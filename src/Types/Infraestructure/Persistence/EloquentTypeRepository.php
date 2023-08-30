<?php

namespace Src\Types\Infraestructure\Persistence;

use Src\Types\Domain\Model\Type;
use Src\Types\Domain\Repository\TypeRepositoryInterface;

class EloquentTypeRepository implements TypeRepositoryInterface
{
    public function create(array $data)
    {
        return Type::create($data);
    }

    public function read(int $id)
    {
        return Type::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $type = Type::findOrFail($id);
        if ($type) {
            $type->update($data);
        }
        return $type;
    }

    public function delete(int $id)
    {
        $type = Type::findOrFail($id);
        if ($type) {
            $type->delete();
        }
    }
}
