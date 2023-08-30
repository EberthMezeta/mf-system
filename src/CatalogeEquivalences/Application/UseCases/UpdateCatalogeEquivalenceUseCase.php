<?php

namespace Src\CatalogeEquivalences\Application\UseCases;

use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceUpdateInterface;
use Src\CatalogeEquivalences\Domain\Repository\CatalogeEquivalenceRepositoryInterface;

class UpdateCatalogeEquivalenceUseCase implements CatalogeEquivalenceUpdateInterface
{
    protected $repository;

    public function __construct(CatalogeEquivalenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
