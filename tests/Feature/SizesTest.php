<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Sizes\Application\Contracts\SizeCreateInterface;
use Src\Sizes\Application\Contracts\SizeDeleteInterface;
use Src\Sizes\Application\Contracts\SizeUpdateInterface;
use Src\Sizes\Domain\Model\Size;

uses(RefreshDatabase::class);

it('Create Size Scenery: Correct Data', function () {
    $data = [
        'nombre' => 'Nombre del Tamaño',
        'descripcion' => 'Descripción del Tamaño',
    ];

    $sizeCreateService = app(SizeCreateInterface::class);

    $createdSize = $sizeCreateService->create($data);

    expect($createdSize)->toBeInstanceOf(Size::class);
    expect($createdSize->nombre)->toBe($data['nombre']);
    expect($createdSize->descripcion)->toBe($data['descripcion']);
});

it('Create Size Scenery: Empty Data', function () {
    $data = [];

    $sizeCreateService = app(SizeCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $sizeCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Size Scenery: Missing Required Fields', function () {
    // Configurar datos incorrectos (faltan campos obligatorios)
    $data = [
        'descripcion' => 'Descripción del Tamaño',
    ];

    $sizeCreateService = app(SizeCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $sizeCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Delete Size Scenery: delete an existing size', function () {
    $data = [
        'nombre' => 'Nombre del Tamaño',
        'descripcion' => 'Descripción del Tamaño',
    ];

    $sizeCreateService = app(SizeCreateInterface::class);

    $createdSize = $sizeCreateService->create($data);

    $sizeId = $createdSize->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, SizeDeleteService)
    $sizeDeleteService = app(SizeDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $sizeDeleteService->delete($sizeId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete Size Scenery: delete a non-existing size', function () {
    // Configurar un ID ficticio para un tamaño que no existe
    $nonExistingSizeId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, SizeDeleteService)
    $sizeDeleteService = app(SizeDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $sizeDeleteService->delete($nonExistingSizeId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Size Scenery: update an existing size with correct data', function () {
    $data = [
        'nombre' => 'Nombre del Tamaño',
        'descripcion' => 'Descripción del Tamaño',
    ];

    $sizeCreateService = app(SizeCreateInterface::class);

    $createdSize = $sizeCreateService->create($data);

    $sizeId = $createdSize->id;

    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'descripcion' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, SizeUpdateService)
    $sizeUpdateService = app(SizeUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $sizeUpdateService->update($sizeId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
    expect($result->descripcion)->toBe($updatedData['descripcion']);
});

it('Update Size Scenery: update an existing size with invalid data', function () {
    $data = [
        'nombre' => 'Nombre del Tamaño',
        'descripcion' => 'Descripción del Tamaño',
    ];

    $sizeCreateService = app(SizeCreateInterface::class);

    $createdSize = $sizeCreateService->create($data);

    $sizeId = $createdSize->id;

    $updatedData = [
        'descripcion' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, SizeUpdateService)
    $sizeUpdateService = app(SizeUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $sizeUpdateService->update($sizeId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Size Scenery: update a non-existing size', function () {
    // Configurar un ID ficticio para un tamaño que no existe
    $nonExistingSizeId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'descripcion' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, SizeUpdateService)
    $sizeUpdateService = app(SizeUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $sizeUpdateService->update($nonExistingSizeId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
