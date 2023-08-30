<?php
namespace Src\Products\Application\Contracts;

interface ProductUpdateInterface
{
    public function update(int $id, array $data);
}
