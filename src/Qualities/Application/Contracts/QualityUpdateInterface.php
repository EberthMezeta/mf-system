<?php

namespace Src\Qualities\Application\Contracts;

interface QualityUpdateInterface
{
    public function update(int $id, array $data);
}
