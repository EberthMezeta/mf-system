<?php
namespace Src\Qualities\Application\UseCases;

use Src\Qualities\Application\Contracts\QualityUpdateInterface;
use Src\Qualities\Domain\Repository\QualityRepositoryInterface;

class UpdateQualityUseCase implements QualityUpdateInterface
{
    protected $repository;

    public function __construct(QualityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function update(int $id, array $data)
    {
        if (empty($data['nombre'])) {
            throw new \InvalidArgumentException('El campo "nombre" es obligatorio.');
        }
        return $this->repository->update($id, $data);
    }
}
