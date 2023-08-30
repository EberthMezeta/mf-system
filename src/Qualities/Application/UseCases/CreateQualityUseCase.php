<?php
namespace Src\Qualities\Application\UseCases;

use Src\Qualities\Application\Contracts\QualityCreateInterface;
use Src\Qualities\Domain\Repository\QualityRepositoryInterface;

class CreateQualityUseCase implements QualityCreateInterface
{
    protected $repository;

    public function __construct(QualityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
