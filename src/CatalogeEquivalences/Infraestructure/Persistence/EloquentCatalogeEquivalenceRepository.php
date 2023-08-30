<?php

namespace Src\CatalogeEquivalences\Infraestructure\Persistence;

use Src\CatalogeEquivalences\Domain\Model\CatalogeEquivalence;
use Src\CatalogeEquivalences\Domain\Repository\CatalogeEquivalenceRepositoryInterface;

class EloquentCatalogeEquivalenceRepository implements CatalogeEquivalenceRepositoryInterface
{
    public function create(array $data)
    {
        return CatalogeEquivalence::create($data);
    }

    public function read(int $id)
    {
        return CatalogeEquivalence::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $equivalence = CatalogeEquivalence::findOrFail($id);
        if ($equivalence) {
            $equivalence->update($data);
        }
        return $equivalence;
    }

    public function delete(int $id)
    {
        $equivalence = CatalogeEquivalence::findOrFail($id);
        if ($equivalence) {
            $equivalence->delete();
        }
    }
}
