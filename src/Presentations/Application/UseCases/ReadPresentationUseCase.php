<?php
namespace Src\Presentations\Application\UseCases;

use Src\Presentations\Application\Contracts\PresentationReadInterface;
use Src\Presentations\Domain\Repository\PresentationRepositoryInterface;

class ReadPresentationUseCase implements PresentationReadInterface
{
    protected $repository;

    public function __construct(PresentationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read(int $id)
    {
        return $this->repository->read($id);
    }
}
