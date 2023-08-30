<?php
namespace Src\Types\Application\UseCases;

use Src\Types\Application\Contracts\TypeDeleteInterface;
use Src\Types\Domain\Repository\TypeRepositoryInterface;

class DeleteTypeUseCase implements TypeDeleteInterface
{
    protected $repository;

    public function __construct(TypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
