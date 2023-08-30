<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Brands\Application\Contracts\BrandCreateInterface;
use Src\Brands\Application\Contracts\BrandDeleteInterface;
use Src\Brands\Application\Contracts\BrandUpdateInterface;

use Src\Brands\Domain\Model\Brand;

uses(RefreshDatabase::class);

it('Create Brand Scenery: Correct Data', function () {
    $data = [
        'nombre' => 'Nombre de la Marca',
        'comentarios' => 'Descripción de la Marca',
    ];

    $brandCreateService = app(BrandCreateInterface::class);

    $createdBrand = $brandCreateService->create($data);

    expect($createdBrand)->toBeInstanceOf(Brand::class);
    expect($createdBrand->nombre)->toBe($data['nombre']);
    expect($createdBrand->comentarios)->toBe($data['comentarios']);
});

it('Create Brand Scenery: Empty Data', function () {
    $data = [];

    $brandCreateService = app(BrandCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $brandCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Brand Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'nombre')
    $data = [
        'comentarios' => 'Descripción de la Marca',
    ];

    $brandCreateService = app(BrandCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $brandCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete Brand Scenery: delete an existing brand', function () {
    $data = [
        'nombre' => 'Nombre de la Marca',
        'comentarios' => 'Descripción de la Marca',
    ];

    $brandCreateService = app(BrandCreateInterface::class);

    $createdBrand = $brandCreateService->create($data);

    $brandId = $createdBrand->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, BrandDeleteService)
    $brandDeleteService = app(BrandDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $brandDeleteService->delete($brandId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete Brand Scenery: delete a non-existing brand', function () {
    // Configurar un ID ficticio para una marca que no existe
    $nonExistingBrandId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, BrandDeleteService)
    $brandDeleteService = app(BrandDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $brandDeleteService->delete($nonExistingBrandId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Brand Scenery: update an existing brand with correct data', function () {
    $data = [
        'nombre' => 'Nombre de la Marca',
        'comentarios' => 'Descripción de la Marca',
    ];

    $brandCreateService = app(BrandCreateInterface::class);

    $createdBrand = $brandCreateService->create($data);

    $brandId = $createdBrand->id;

    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, BrandUpdateService)
    $brandUpdateService = app(BrandUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $brandUpdateService->update($brandId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
    expect($result->comentarios)->toBe($updatedData['comentarios']);
});

it('Update Brand Scenery: update an existing brand with invalid data', function () {
    $data = [
        'nombre' => 'Nombre de la Marca',
        'comentarios' => 'Descripción de la Marca',
    ];

    $brandCreateService = app(BrandCreateInterface::class);

    $createdBrand = $brandCreateService->create($data);

    $brandId = $createdBrand->id;

    $updatedData = [
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, BrandUpdateService)
    $brandUpdateService = app(BrandUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $brandUpdateService->update($brandId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Brand Scenery: update a non-existing brand', function () {
    // Configurar un ID ficticio para una marca que no existe
    $nonExistingBrandId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, BrandUpdateService)
    $brandUpdateService = app(BrandUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $brandUpdateService->update($nonExistingBrandId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
