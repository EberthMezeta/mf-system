<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Presentations\Application\Contracts\PresentationCreateInterface;
use Src\Presentations\Application\Contracts\PresentationDeleteInterface;
use Src\Presentations\Application\Contracts\PresentationUpdateInterface;
use Src\Presentations\Domain\Model\Presentation;

uses(RefreshDatabase::class);

it('Create Presentation Scenery: Correct Data', function () {
    $data = [
        'nombre' => 'Nombre de la Presentación',
        'descripcion' => 'Descripción de la Presentación',
    ];

    $presentationCreateService = app(PresentationCreateInterface::class);

    $createdPresentation = $presentationCreateService->create($data);

    expect($createdPresentation)->toBeInstanceOf(Presentation::class);
    expect($createdPresentation->nombre)->toBe($data['nombre']);
    expect($createdPresentation->descripcion)->toBe($data['descripcion']);
});

it('Create Presentation Scenery: Empty Data', function () {
    $data = [];

    $presentationCreateService = app(PresentationCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $presentationCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Presentation Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'nombre')
    $data = [
        'descripcion' => 'Descripción de la Presentación',
    ];

    $presentationCreateService = app(PresentationCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $presentationCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete Presentation Scenery: delete an existing presentation', function () {
    $data = [
        'nombre' => 'Nombre de la Presentación',
        'descripcion' => 'Descripción de la Presentación',
    ];

    $presentationCreateService = app(PresentationCreateInterface::class);

    $createdPresentation = $presentationCreateService->create($data);

    $presentationId = $createdPresentation->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, PresentationDeleteService)
    $presentationDeleteService = app(PresentationDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $presentationDeleteService->delete($presentationId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete Presentation Scenery: delete a non-existing presentation', function () {
    // Configurar un ID ficticio para una presentación que no existe
    $nonExistingPresentationId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, PresentationDeleteService)
    $presentationDeleteService = app(PresentationDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $presentationDeleteService->delete($nonExistingPresentationId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Presentation Scenery: update an existing presentation with correct data', function () {
    $data = [
        'nombre' => 'Nombre de la Presentación',
        'descripcion' => 'Descripción de la Presentación',
    ];

    $presentationCreateService = app(PresentationCreateInterface::class);

    $createdPresentation = $presentationCreateService->create($data);

    $presentationId = $createdPresentation->id;

    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'descripcion' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, PresentationUpdateService)
    $presentationUpdateService = app(PresentationUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $presentationUpdateService->update($presentationId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
    expect($result->descripcion)->toBe($updatedData['descripcion']);
});

it('Update Presentation Scenery: update an existing presentation with invalid data', function () {
    $data = [
        'nombre' => 'Nombre de la Presentación',
        'descripcion' => 'Descripción de la Presentación',
    ];

    $presentationCreateService = app(PresentationCreateInterface::class);

    $createdPresentation = $presentationCreateService->create($data);

    $presentationId = $createdPresentation->id;

    $updatedData = [
        'descripcion' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, PresentationUpdateService)
    $presentationUpdateService = app(PresentationUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $presentationUpdateService->update($presentationId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Presentation Scenery: update a non-existing presentation', function () {
    // Configurar un ID ficticio para una presentación que no existe
    $nonExistingPresentationId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'descripcion' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, PresentationUpdateService)
    $presentationUpdateService = app(PresentationUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $presentationUpdateService->update($nonExistingPresentationId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
