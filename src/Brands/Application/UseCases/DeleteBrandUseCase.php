<?php
namespace Src\Brands\Application\UseCases;

use Src\Brands\Application\Contracts\BrandDeleteInterface;
use Src\Brands\Domain\Repository\BrandRepositoryInterface;


class DeleteBrandUseCase implements BrandDeleteInterface
{
    protected $repository;

    public function __construct(BrandRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
