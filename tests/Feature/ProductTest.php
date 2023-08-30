<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Products\Application\Contracts\ProductCreateInterface;
use Src\Products\Domain\Model\Product;
use Src\Families\Domain\Model\Family; // Asegúrate de importar la clase Family
use Src\Products\Application\Contracts\ProductDeleteInterface;
use Src\Products\Application\Contracts\ProductUpdateInterface;

uses(RefreshDatabase::class);

it('Create Product Scenery: Correct Data', function () {
    $data = [
        'familia_id' => Family::factory()->create()->id,
        'nombre' => 'Nombre del Producto',
        'url_foto' => 'URL de la Foto',
        'comentarios' => 'Comentarios del Producto',
    ];

    $productCreateService = app(ProductCreateInterface::class);

    $createdProduct = $productCreateService->create($data);

    expect($createdProduct)->toBeInstanceOf(Product::class);
    expect($createdProduct->nombre)->toBe($data['nombre']);
    expect($createdProduct->url_foto)->toBe($data['url_foto']);
    expect($createdProduct->comentarios)->toBe($data['comentarios']);
});

it('Create Product Scenery: Empty Data', function () {
    $data = [];

    $productCreateService = app(ProductCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $productCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create Product Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'nombre')
    $data = [
        'familia_id' => Family::factory()->create()->id,
        'url_foto' => 'URL de la Foto',
        'comentarios' => 'Comentarios del Producto',
    ];

    $productCreateService = app(ProductCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $productCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete Product Scenery: delete an existing product', function () {
    $data = [
        'familia_id' => Family::factory()->create()->id,
        'nombre' => 'Nombre del Producto',
        'url_foto' => 'URL de la Foto',
        'comentarios' => 'Comentarios del Producto',
    ];

    $productCreateService = app(ProductCreateInterface::class);

    $createdProduct = $productCreateService->create($data);

    $productId = $createdProduct->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, ProductDeleteService)
    $productDeleteService = app(ProductDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $productDeleteService->delete($productId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete Product Scenery: delete a non-existing product', function () {
    // Configurar un ID ficticio para un producto que no existe
    $nonExistingProductId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, ProductDeleteService)
    $productDeleteService = app(ProductDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $productDeleteService->delete($nonExistingProductId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});


it('Update Product Scenery: update an existing product with correct data', function () {
    $data = [
        'familia_id' => Family::factory()->create()->id,
        'nombre' => 'Nombre del Producto',
        'url_foto' => 'URL de la Foto',
        'comentarios' => 'Comentarios del Producto',
    ];

    $productCreateService = app(ProductCreateInterface::class);

    $createdProduct = $productCreateService->create($data);

    $productId = $createdProduct->id;

    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'url_foto' => 'Nueva URL de la Foto',
        'comentarios' => 'Nuevos Comentarios del Producto',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, ProductUpdateService)
    $productUpdateService = app(ProductUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $productUpdateService->update($productId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->nombre)->toBe($updatedData['nombre']);
    expect($result->url_foto)->toBe($updatedData['url_foto']);
    expect($result->comentarios)->toBe($updatedData['comentarios']);
});

it('Update Product Scenery: update an existing product with invalid data', function () {
    $data = [
        'familia_id' => Family::factory()->create()->id,
        'nombre' => 'Nombre del Producto',
        'url_foto' => 'URL de la Foto',
        'comentarios' => 'Comentarios del Producto',
    ];

    $productCreateService = app(ProductCreateInterface::class);

    $createdProduct = $productCreateService->create($data);

    $productId = $createdProduct->id;

    $updatedData = [
        'url_foto' => 'Nueva URL de la Foto',
        'comentarios' => 'Nuevos Comentarios del Producto',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, ProductUpdateService)
    $productUpdateService = app(ProductUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $productUpdateService->update($productId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update Product Scenery: update a non-existing product', function () {
    // Configurar un ID ficticio para un producto que no existe
    $nonExistingProductId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'nombre' => 'Nuevo Nombre',
        'url_foto' => 'Nueva URL de la Foto',
        'comentarios' => 'Nuevos Comentarios del Producto',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, ProductUpdateService)
    $productUpdateService = app(ProductUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $productUpdateService->update($nonExistingProductId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
