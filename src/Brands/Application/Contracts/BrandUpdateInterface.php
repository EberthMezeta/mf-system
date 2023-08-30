<?php
namespace Src\Brands\Application\Contracts;

interface BrandUpdateInterface
{
    public function update(int $id, array $data);
}
