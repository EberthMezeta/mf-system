<?php

namespace Src\Products\Domain\Repository;


interface ProductRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function read(int $id);
}
