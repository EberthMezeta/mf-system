<?php
namespace Src\CatalogeEquivalences\Application\Contracts;

interface CatalogeEquivalenceUpdateInterface
{
    public function update(int $id, array $data);
}
