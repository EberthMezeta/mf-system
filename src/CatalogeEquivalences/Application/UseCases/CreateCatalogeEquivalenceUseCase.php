<?php

namespace Src\CatalogeEquivalences\Application\UseCases;

use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceCreateInterface;
use Src\CatalogeEquivalences\Domain\Repository\CatalogeEquivalenceRepositoryInterface;

class CreateCatalogeEquivalenceUseCase implements CatalogeEquivalenceCreateInterface
{
    protected $repository;

    public function __construct(CatalogeEquivalenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
