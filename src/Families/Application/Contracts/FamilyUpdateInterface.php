<?php
namespace Src\Families\Application\Contracts;


interface FamilyUpdateInterface
{
    public function update(int $id, array $data);
}
