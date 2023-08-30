<?php
namespace Src\Presentations\Application\UseCases;


use Src\Presentations\Application\Contracts\PresentationUpdateInterface;
use Src\Presentations\Domain\Repository\PresentationRepositoryInterface;



class UpdatePresentationUseCase implements PresentationUpdateInterface
{
    protected $repository;

    public function __construct(PresentationRepositoryInterface $repository)
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
