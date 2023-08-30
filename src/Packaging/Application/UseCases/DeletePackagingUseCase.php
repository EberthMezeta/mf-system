<?php
namespace Src\Packaging\Application\UseCases;

use Src\Packaging\Application\Contracts\PackagingDeleteInterface;
use Src\Packaging\Domain\Repository\PackagingRepositoryInterface;

class DeletePackagingUseCase implements PackagingDeleteInterface
{
    protected $repository;

    public function __construct(PackagingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
