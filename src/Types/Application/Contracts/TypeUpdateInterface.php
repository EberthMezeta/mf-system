<?php
namespace Src\Types\Application\Contracts;

interface TypeUpdateInterface
{
    public function update(int $id, array $data);
}
