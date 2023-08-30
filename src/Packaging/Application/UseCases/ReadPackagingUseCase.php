<?php


namespace Src\Packaging\Application\UseCases;

use Src\Packaging\Application\Contracts\PackagingReadInterface;
use Src\Packaging\Domain\Repository\PackagingRepositoryInterface;

class ReadPackagingUseCase implements PackagingReadInterface
{
    protected $repository;

    public function __construct(PackagingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
