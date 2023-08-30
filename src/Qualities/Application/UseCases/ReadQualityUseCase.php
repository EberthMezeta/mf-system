<?php
namespace Src\Qualities\Application\UseCases;

use Src\Qualities\Application\Contracts\QualityReadInterface;
use Src\Qualities\Domain\Repository\QualityRepositoryInterface;

class ReadQualityUseCase implements QualityReadInterface
{
    protected $repository;

    public function __construct(QualityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
