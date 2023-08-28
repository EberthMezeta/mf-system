<?php
namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyReadInterface;

class ReadFamilyUseCase
{
    protected $familyReadService;

    public function __construct(FamilyReadInterface $familyReadService)
    {
        $this->familyReadService = $familyReadService;
    }

    public function execute(int $id)
    {
        return $this->familyReadService->read($id);
    }
}
