<?php
namespace Src\Sizes\Application\UseCases;

use Src\Sizes\Application\Contracts\SizeCreateInterface;
use Src\Sizes\Domain\Repository\SizeRepositoryInterface;

class CreateSizeUseCase implements SizeCreateInterface
{
    protected $repository;

    public function __construct(SizeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
