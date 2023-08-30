<?php
namespace Src\Qualities\Application\UseCases;

use Src\Qualities\Application\Contracts\QualityDeleteInterface;
use Src\Qualities\Domain\Repository\QualityRepositoryInterface;

class DeleteQualityUseCase implements QualityDeleteInterface
{
    protected $repository;

    public function __construct(QualityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
