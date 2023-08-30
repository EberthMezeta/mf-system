<?php

// src/Sizes/Infrastructure/Persistence/EloquentSizeRepository.php

namespace Src\Sizes\Infraestructure\Persistence;

use Src\Sizes\Domain\Model\Size;
use Src\Sizes\Domain\Repository\SizeRepositoryInterface;

class EloquentSizeRepository implements SizeRepositoryInterface
{
    public function create(array $data)
    {
        return Size::create($data);
    }

    public function read(int $id)
    {
        return Size::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $size = Size::findOrFail($id);
        if ($size) {
            $size->update($data);
        }
        return $size;
    }

    public function delete(int $id)
    {
        $size = Size::findOrFail($id);
        if ($size) {
            $size->delete();
        }
    }
}
