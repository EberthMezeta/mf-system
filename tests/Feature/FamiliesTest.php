<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Families\Application\Contracts\FamilyCreateInterface;
use Src\Families\Application\Contracts\FamilyDeleteInterface;
use Src\Families\Application\Contracts\FamilyUpdateInterface;

use Src\Families\Domain\Model\Family;



uses(RefreshDatabase::class);


it('Create Family Scenery: Correct Data', function () {
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

    $data = [];

    $familyCreateService = app(FamilyCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $familyCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Family scenery: Invalid Data', function () {


      // Configurar datos incorrectos (por ejemplo, falta el campo 'nombre')
      $data = [
        'comentarios' => 'Comentarios de la Familia',
    ];

    $familyCreateService = app(FamilyCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $familyCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete Family scenary: delete an existing family ', function () {

    $data = [
        'nombre' => 'Nombre de la Familia',
        'comentarios' => 'Comentarios de la Familia',
    ];

    $familyCreateService = app(FamilyCreateInterface::class);

    $createdFamily = $familyCreateService->create($data);

    $familyId = $createdFamily->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, FamilyDeleteService)
    $familyDeleteService = app(FamilyDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $familyDeleteService->delete($familyId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});


it('Delete Family scenary: delete an no existing family ', function () {


        // Configurar un ID ficticio para una familia que no existe
        $nonExistingFamilyId = 999;

        // Obtener una instancia de tu servicio de eliminación (por ejemplo, FamilyDeleteService)
        $familyDeleteService = app(FamilyDeleteInterface::class);

        // Ejecutar el servicio de eliminación y capturar la excepción
        $exceptionThrown = false;
        try {
            $familyDeleteService->delete($nonExistingFamilyId);
        } catch (\Exception $e) {
            $exceptionThrown = true;
        }

        // Verificar que se haya lanzado una excepción
        expect($exceptionThrown)->toBeTrue();
        // Puedes realizar más aserciones si es necesario

});


it('Update Family scenary: update an existing family with correct data', function () {

    $data = [
        'nombre' => 'Nombre de la Familia',
        'comentarios' => 'Comentarios de la Familia',
    ];

    $familyCreateService = app(FamilyCreateInterface::class);

    $createdFamily = $familyCreateService->create($data);

    $familyId = $createdFamily->id;

    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'comentarios' => 'Nuevos Comentarios',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, FamilyUpdateService)
    $familyUpdateService = app(FamilyUpdateInterface::class);


    // Ejecutar el servicio de actualización
    $result = $familyUpdateService->update($familyId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
    expect($result->comentarios)->toBe($updatedData['comentarios']);
});


it('Update Family scenary: update an existing family with invalid data', function () {


    $data = [
        'nombre' => 'Nombre de la Familia',
        'comentarios' => 'Comentarios de la Familia',
    ];

    $familyCreateService = app(FamilyCreateInterface::class);

    $createdFamily = $familyCreateService->create($data);

    $familyId = $createdFamily->id;

    $updatedData = [
        'comentarios' => 'Nuevos Comentarios',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, FamilyUpdateService)
    $familyUpdateService = app(FamilyUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $familyUpdateService->update($familyId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();


});


it('Update Family scenary: update an no existing family', function () {


       // Configurar un ID ficticio para una familia que no existe
       $nonExistingFamilyId = 999;

       // Configurar los datos de actualización
       $updatedData = [
           'nombre' => 'Nuevo Nombre',
           'comentarios' => 'Nuevos Comentarios',
       ];

       // Obtener una instancia de tu servicio de actualización (por ejemplo, FamilyUpdateService)
       $familyUpdateService = app(FamilyUpdateInterface::class);

       // Ejecutar el servicio de actualización y capturar la excepción
       $exceptionThrown = false;
       try {
           $familyUpdateService->update($nonExistingFamilyId, $updatedData);
       } catch (\Exception $e) {
           $exceptionThrown = true;
       }

       // Verificar que se haya lanzado una excepción
       expect($exceptionThrown)->toBeTrue();
       // Puedes realizar más aserciones si es necesario

});
