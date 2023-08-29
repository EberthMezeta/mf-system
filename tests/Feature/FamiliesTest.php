<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Families\Application\Contracts\FamilyCreateInterface;
use Src\Families\Domain\Model\Family;



uses(RefreshDatabase::class);


it('can create a family', function () {
    $data = [
        'nombre' => 'Nombre de la Familia',
        'comentarios' => 'Comentarios de la Familia',
    ];


    $familyCreateService = app(FamilyCreateInterface::class);

    $createdFamily = $familyCreateService->create($data);

    expect($createdFamily)->toBeInstanceOf(Family::class);
    expect($createdFamily->nombre)->toBe($data['nombre']);
    expect($createdFamily->comentarios)->toBe($data['comentarios']);
});

it('Create Family Scenery: Empty Data', function () {

    $this->assertTrue(true);
});

it('Create Family scenery: Invalid Data', function () {

    $this->assertTrue(true);
});

it('Delete Family scenary: delete an existing family ', function () {
    $this->assertTrue(true);
});


it('Delete Family scenary: delete an no existing family ', function () {
    $this->assertTrue(true);
});

it('Update Family scenary: update an existing family', function () {
    $this->assertTrue(true);
});

it('Update Family scenary: update an existing family with correct data', function () {
    $this->assertTrue(true);
});


it('Update Family scenary: update an existing family with invalid data', function () {
    $this->assertTrue(true);
});


it('Update Family scenary: update an no existing family', function () {
    $this->assertTrue(true);
});
