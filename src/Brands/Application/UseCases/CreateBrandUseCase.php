<?php

namespace Src\Brands\Application\UseCases;

use Src\Brands\Application\Contracts\BrandCreateInterface;
use Src\Brands\Domain\Repository\BrandRepositoryInterface;

class CreateBrandUseCase implements BrandCreateInterface
{
    protected $repository;

    public function __construct(BrandRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
