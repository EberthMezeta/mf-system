<?php
namespace Src\Sizes\Application\UseCases;

use Src\Sizes\Application\Contracts\SizeReadInterface;
use Src\Sizes\Domain\Repository\SizeRepositoryInterface;

class ReadSizeUseCase implements SizeReadInterface
{
    protected $repository;

    public function __construct(SizeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
