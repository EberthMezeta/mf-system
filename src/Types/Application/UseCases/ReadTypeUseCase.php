<?php
namespace Src\Types\Application\UseCases;

use Src\Types\Application\Contracts\TypeReadInterface;
use Src\Types\Domain\Repository\TypeRepositoryInterface;

class ReadTypeUseCase implements TypeReadInterface
{
    protected $repository;

    public function __construct(TypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
