<?php

namespace Src\Sizes\Domain\Repository;

interface SizeRepositoryInterface
{
    public function create(array $data);

    public function read(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}
