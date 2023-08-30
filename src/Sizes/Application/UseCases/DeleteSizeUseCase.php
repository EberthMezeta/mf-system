<?php
namespace Src\Sizes\Application\UseCases;

use Src\Sizes\Application\Contracts\SizeDeleteInterface;
use Src\Sizes\Domain\Repository\SizeRepositoryInterface;

class DeleteSizeUseCase implements SizeDeleteInterface
{
    protected $repository;

    public function __construct(SizeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
