<?php
namespace Src\Packaging\Application\Contracts;

interface PackagingUpdateInterface
{
    public function update(int $id, array $data);
}
