<?php
namespace Src\Presentations\Application\UseCases;

use Src\Presentations\Application\Contracts\PresentationCreateInterface;
use Src\Presentations\Domain\Repository\PresentationRepositoryInterface;

class CreatePresentationUseCase implements PresentationCreateInterface
{
    protected $repository;

    public function __construct(PresentationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
