<?php
namespace Src\CatalogeProducts\Application\Contracts;

interface CatalogeProductUpdateInterface
{
    public function update(int $id, array $data);
}
