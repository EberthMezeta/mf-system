<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Types\Application\Contracts\TypeCreateInterface;
use Src\Types\Application\Contracts\TypeDeleteInterface;
use Src\Types\Application\Contracts\TypeUpdateInterface;
use Src\Types\Domain\Model\Type;

uses(RefreshDatabase::class);

it('Create Type Scenery: Correct Data', function () {
    $data = [
        'nombre' => 'Nombre del Tipo',
    ];

    $typeCreateService = app(TypeCreateInterface::class);

    $createdType = $typeCreateService->create($data);

    expect($createdType)->toBeInstanceOf(Type::class);
    expect($createdType->nombre)->toBe($data['nombre']);
});

it('Create Type Scenery: Empty Data', function () {
    $data = [];

    $typeCreateService = app(TypeCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $typeCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Type Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'nombre')
    $data = [
        'descripcion' => 'Descripción del Tipo',
    ];

    $typeCreateService = app(TypeCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $typeCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

// Añadir pruebas para Update, Delete y Read aquí

it('Update Type Scenery: Update an Existing Type with Correct Data', function () {
    // Crear un tipo de ejemplo
    $data = [
        'nombre' => 'Nombre del Tipo',
    ];

    $typeCreateService = app(TypeCreateInterface::class);
    $createdType = $typeCreateService->create($data);

    // Datos actualizados
    $updatedData = [
        'nombre' => 'Nuevo Nombre',
    ];

    $typeUpdateService = app(TypeUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $typeUpdateService->update($createdType->id, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
});

it('Update Type Scenery: Update an Existing Type with Invalid Data', function () {
    // Crear un tipo de ejemplo
    $data = [
        'nombre' => 'ge',
        'comentarios' => 'Nombre del Tipo',
    ];

    $typeCreateService = app(TypeCreateInterface::class);
    $createdType = $typeCreateService->create($data);

    // Datos de actualización inválidos (por ejemplo, falta el campo 'nombre')
    $updatedData = [
        'comentarios' => 'Nueva Descripción',
    ];

    $typeUpdateService = app(TypeUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $typeUpdateService->update($createdType->id, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Delete Type Scenery: Delete an Existing Type', function () {
    // Crear un tipo de ejemplo
    $data = [
        'nombre' => 'Nombre del Tipo',
        'comentarios' => 'Descripción del Tipo',
    ];

    $typeCreateService = app(TypeCreateInterface::class);
    $createdType = $typeCreateService->create($data);

    $typeDeleteService = app(TypeDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $typeDeleteService->delete($createdType->id);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete Type Scenery: Delete a Non-Existing Type', function () {
    // Configurar un ID ficticio para un tipo que no existe
    $nonExistingTypeId = 999;

    $typeDeleteService = app(TypeDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $typeDeleteService->delete($nonExistingTypeId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
