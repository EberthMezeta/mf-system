<?php
namespace Src\Presentations\Application\Contracts;


interface PresentationUpdateInterface
{
    public function update(int $id, array $data);
}

