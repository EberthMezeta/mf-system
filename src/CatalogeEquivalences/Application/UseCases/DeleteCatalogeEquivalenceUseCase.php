<?php

namespace Src\CatalogeEquivalences\Application\UseCases;

use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceDeleteInterface;
use Src\CatalogeEquivalences\Domain\Repository\CatalogeEquivalenceRepositoryInterface;

class DeleteCatalogeEquivalenceUseCase implements CatalogeEquivalenceDeleteInterface
{
    protected $repository;

    public function __construct(CatalogeEquivalenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
