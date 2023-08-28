<?php
namespace Src\Families\Application\UseCases;

use Src\Families\Application\Contracts\FamilyUpdateInterface;

class UpdateFamilyUseCase
{
    protected $familyUpdateService;

    public function __construct(FamilyUpdateInterface $familyUpdateService)
    {
        $this->familyUpdateService = $familyUpdateService;
    }

    public function execute(int $id, array $data)
    {
        return $this->familyUpdateService->update($id, $data);
    }
}
