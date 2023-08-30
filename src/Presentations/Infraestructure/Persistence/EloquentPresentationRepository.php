<?php
namespace Src\Presentations\Infraestructure\Persistence;

use Src\Presentations\Domain\Model\Presentation;
use Src\Presentations\Domain\Repository\PresentationRepositoryInterface;

class EloquentPresentationRepository implements PresentationRepositoryInterface
{
    public function create(array $data)
    {
        return Presentation::create($data);
    }

    public function read(int $id)
    {
        return Presentation::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $presentation = Presentation::findOrFail($id);
        if ($presentation) {
            $presentation->update($data);
        }
        return $presentation;
    }

    public function delete(int $id)
    {
        $presentation = Presentation::findOrFail($id);
        if ($presentation) {
            $presentation->delete();
        }
    }
}
