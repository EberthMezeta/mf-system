<?php
namespace Src\Qualities\Infraestructure\Persistence;

use Src\Qualities\Domain\Model\Quality;
use Src\Qualities\Domain\Repository\QualityRepositoryInterface;

class EloquentQualityRepository implements QualityRepositoryInterface
{
    public function create(array $data)
    {
        return Quality::create($data);
    }

    public function read(int $id)
    {
        return Quality::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $quality = Quality::findOrFail($id);
        if ($quality) {
            $quality->update($data);
        }
        return $quality;
    }

    public function delete(int $id)
    {
        $quality = Quality::findOrFail($id);
        if ($quality) {
            $quality->delete();
        }
    }
}
