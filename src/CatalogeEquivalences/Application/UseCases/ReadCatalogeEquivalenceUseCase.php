<?php

namespace Src\CatalogeEquivalences\Application\UseCases;

use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceReadInterface;
use Src\CatalogeEquivalences\Domain\Repository\CatalogeEquivalenceRepositoryInterface;

class ReadCatalogeEquivalenceUseCase implements CatalogeEquivalenceReadInterface
{
    protected $repository;

    public function __construct(CatalogeEquivalenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
