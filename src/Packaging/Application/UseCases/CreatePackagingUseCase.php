<?php
namespace Src\Packaging\Application\UseCases;

use Src\Packaging\Application\Contracts\PackagingCreateInterface;
use Src\Packaging\Domain\Repository\PackagingRepositoryInterface;

class CreatePackagingUseCase implements PackagingCreateInterface
{
    protected $repository;

    public function __construct(PackagingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
