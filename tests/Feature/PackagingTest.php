<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Packaging\Application\Contracts\PackagingCreateInterface;
use Src\Packaging\Application\Contracts\PackagingDeleteInterface;
use Src\Packaging\Application\Contracts\PackagingUpdateInterface;
use Src\Packaging\Domain\Model\Packaging;

uses(RefreshDatabase::class);

it('Create Packaging Scenery: Correct Data', function () {

    $data = [
        'nombre' => 'Nombre del Packaging',
        'es_kilo' => true,
        'comentarios' => 'Descripción del Packaging',
    ];

    $packagingCreateService = app(PackagingCreateInterface::class);

    $createdPackaging = $packagingCreateService->create($data);

    expect($createdPackaging)->toBeInstanceOf(Packaging::class);
    expect($createdPackaging->nombre)->toBe($data['nombre']);
    expect($createdPackaging->es_kilo)->toBe($data['es_kilo']);
    expect($createdPackaging->comentarios)->toBe($data['comentarios']);
});

it('Create Packaging Scenery: Empty Data', function () {
    $data = [];

    $packagingCreateService = app(PackagingCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $packagingCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Packaging Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'nombre')
    $data = [
        'es_kilo' => true,
        'comentarios' => 'Descripción del Packaging',
    ];

    $packagingCreateService = app(PackagingCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $packagingCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete Packaging Scenery: delete an existing packaging', function () {
    $data = [
        'nombre' => 'Nombre del Packaging',
        'es_kilo' => true,
        'comentarios' => 'Descripción del Packaging',
    ];

    $packagingCreateService = app(PackagingCreateInterface::class);

    $createdPackaging = $packagingCreateService->create($data);

    $packagingId = $createdPackaging->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, PackagingDeleteService)
    $packagingDeleteService = app(PackagingDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $packagingDeleteService->delete($packagingId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete Packaging Scenery: delete a non-existing packaging', function () {
    // Configurar un ID ficticio para un packaging que no existe
    $nonExistingPackagingId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, PackagingDeleteService)
    $packagingDeleteService = app(PackagingDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $packagingDeleteService->delete($nonExistingPackagingId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Packaging Scenery: update an existing packaging with correct data', function () {
    $data = [
        'nombre' => 'Nombre del Packaging',
        'es_kilo' => true,
        'comentarios' => 'Descripción del Packaging',
    ];

    $packagingCreateService = app(PackagingCreateInterface::class);

    $createdPackaging = $packagingCreateService->create($data);

    $packagingId = $createdPackaging->id;

    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'es_kilo' => false,
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, PackagingUpdateService)
    $packagingUpdateService = app(PackagingUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $packagingUpdateService->update($packagingId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
    expect($result->es_kilo)->toBe($updatedData['es_kilo']);
    expect($result->comentarios)->toBe($updatedData['comentarios']);
});

it('Update Packaging Scenery: update an existing packaging with invalid data', function () {
    $data = [
        'nombre' => 'Nombre del Packaging',
        'es_kilo' => true,
        'comentarios' => 'Descripción del Packaging',
    ];

    $packagingCreateService = app(PackagingCreateInterface::class);

    $createdPackaging = $packagingCreateService->create($data);

    $packagingId = $createdPackaging->id;

    $updatedData = [
        'es_kilo' => false,
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, PackagingUpdateService)
    $packagingUpdateService = app(PackagingUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $packagingUpdateService->update($packagingId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Packaging Scenery: update a non-existing packaging', function () {
    // Configurar un ID ficticio para un packaging que no existe
    $nonExistingPackagingId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'es_kilo' => false,
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, PackagingUpdateService)
    $packagingUpdateService = app(PackagingUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $packagingUpdateService->update($nonExistingPackagingId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

