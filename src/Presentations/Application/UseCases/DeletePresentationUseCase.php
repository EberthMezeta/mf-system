<?php
namespace Src\Presentations\Application\UseCases;

use Src\Presentations\Application\Contracts\PresentationDeleteInterface;
use Src\Presentations\Domain\Repository\PresentationRepositoryInterface;

class DeletePresentationUseCase implements PresentationDeleteInterface
{
    protected $repository;

    public function __construct(PresentationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
