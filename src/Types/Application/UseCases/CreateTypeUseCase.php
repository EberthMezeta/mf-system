<?php
namespace Src\Types\Application\UseCases;

use Src\Types\Application\Contracts\TypeCreateInterface;
use Src\Types\Domain\Repository\TypeRepositoryInterface;

class CreateTypeUseCase implements TypeCreateInterface
{
    protected $repository;

    public function __construct(TypeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
