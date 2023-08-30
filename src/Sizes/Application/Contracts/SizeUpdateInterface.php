<?php
namespace Src\Sizes\Application\Contracts;

interface SizeUpdateInterface
{
    public function update(int $id, array $data);
}
