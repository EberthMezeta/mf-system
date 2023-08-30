<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Qualities\Application\Contracts\QualityCreateInterface;
use Src\Qualities\Application\Contracts\QualityDeleteInterface;
use Src\Qualities\Application\Contracts\QualityUpdateInterface;
use Src\Qualities\Domain\Model\Quality;

uses(RefreshDatabase::class);

it('Create Quality Scenery: Correct Data', function () {
    $data = [
        'nombre' => 'Alta',
        'descripcion' => 'Buena calidad',
    ];

    $qualityCreateService = app(QualityCreateInterface::class);

    $createdQuality = $qualityCreateService->create($data);

    expect($createdQuality)->toBeInstanceOf(Quality::class);
    expect($createdQuality->nombre)->toBe($data['nombre']);
    expect($createdQuality->descripcion)->toBe($data['descripcion']);
});

it('Create Quality Scenery: Empty Data', function () {
    $data = [];

    $qualityCreateService = app(QualityCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $qualityCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Quality Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'nombre')
    $data = [
        'descripcion' => 'Buena calidad',
    ];

    $qualityCreateService = app(QualityCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $qualityCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete Quality Scenery: delete an existing quality', function () {
    $data = [
        'nombre' => 'Alta',
        'descripcion' => 'Buena calidad',
    ];

    $qualityCreateService = app(QualityCreateInterface::class);

    $createdQuality = $qualityCreateService->create($data);

    $qualityId = $createdQuality->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, QualityDeleteService)
    $qualityDeleteService = app(QualityDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $qualityDeleteService->delete($qualityId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete Quality Scenery: delete a non-existing quality', function () {
    // Configurar un ID ficticio para una calidad que no existe
    $nonExistingQualityId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, QualityDeleteService)
    $qualityDeleteService = app(QualityDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $qualityDeleteService->delete($nonExistingQualityId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Quality Scenery: update an existing quality with correct data', function () {
    $data = [
        'nombre' => 'Alta',
        'descripcion' => 'Buena calidad',
    ];

    $qualityCreateService = app(QualityCreateInterface::class);

    $createdQuality = $qualityCreateService->create($data);

    $qualityId = $createdQuality->id;

    $updatedData = [
        'nombre' => 'Baja',
        'descripcion' => 'Calidad regular',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, QualityUpdateService)
    $qualityUpdateService = app(QualityUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $qualityUpdateService->update($qualityId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
    expect($result->descripcion)->toBe($updatedData['descripcion']);
});

it('Update Quality Scenery: update an existing quality with invalid data', function () {
    $data = [
        'nombre' => 'Alta',
        'descripcion' => 'Buena calidad',
    ];

    $qualityCreateService = app(QualityCreateInterface::class);

    $createdQuality = $qualityCreateService->create($data);

    $qualityId = $createdQuality->id;

    $updatedData = [
        'descripcion' => 'Calidad regular',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, QualityUpdateService)
    $qualityUpdateService = app(QualityUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $qualityUpdateService->update($qualityId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Quality Scenery: update a non-existing quality', function () {
    // Configurar un ID ficticio para una calidad que no existe
    $nonExistingQualityId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'nombre' => 'Baja',
        'descripcion' => 'Calidad regular',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, QualityUpdateService)
    $qualityUpdateService = app(QualityUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $qualityUpdateService->update($nonExistingQualityId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
