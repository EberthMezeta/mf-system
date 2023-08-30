<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Brands\Domain\Model\Brand;
use Src\CatalogeProducts\Application\Contracts\CatalogeProductCreateInterface;
use Src\CatalogeProducts\Application\Contracts\CatalogeProductDeleteInterface;
use Src\CatalogeProducts\Application\Contracts\CatalogeProductUpdateInterface;
use Src\CatalogeProducts\Domain\Model\CatalogeProduct;
use Src\Families\Domain\Model\Family;
use Src\Presentations\Domain\Model\Presentation;
use Src\Products\Domain\Model\Product;
use Src\Qualities\Domain\Model\Quality;
use Src\Sizes\Domain\Model\Size;
use Src\Types\Domain\Model\Type;

uses(RefreshDatabase::class);

it('Create CatalogeProduct Scenery: Correct Data', function () {


    $product = Product::factory()->create();
    $data = [
        'producto_id' => $product->id,
        'tipo_id' => Type::factory()->create()->id,
        'tamano_id' => Size::factory()->create()->id,
        'marca_id' => Brand::factory()->create()->id,
        'presentacion_id' => Presentation::factory()->create()->id,
        'calidad_id' => Quality::factory()->create()->id,
        'url_foto' => 'https://example.com/image.jpg',
        'nomenclatura' => 'ABC123',
        'nombre_corto' => 'Producto ABC',
        'comentarios' => 'Descripción del producto',
    ];

    $catalogeProductCreateService = app(CatalogeProductCreateInterface::class);

    $createdCatalogeProduct = $catalogeProductCreateService->create($data);

    expect($createdCatalogeProduct)->toBeInstanceOf(CatalogeProduct::class);
    expect($createdCatalogeProduct->producto_id)->toBe($data['producto_id']);
    expect($createdCatalogeProduct->tipo_id)->toBe($data['tipo_id']);
    // Agregar más expectativas para otros campos aquí
});

it('Create CatalogeProduct Scenery: Empty Data', function () {
    $data = [];

    $catalogeProductCreateService = app(CatalogeProductCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeProductCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create CatalogeProduct Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'producto_id')
    $data = [
        'tipo_id' => 2,
        'tamano_id' => 3,
        // Otras propiedades faltantes
    ];

    $catalogeProductCreateService = app(CatalogeProductCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeProductCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete CatalogeProduct Scenery: delete an existing CatalogeProduct', function () {
    $product = Product::factory()->create();
    $data = [
        'producto_id' => $product->id,
        'tipo_id' => Type::factory()->create()->id,
        'tamano_id' => Size::factory()->create()->id,
        'marca_id' => Brand::factory()->create()->id,
        'presentacion_id' => Presentation::factory()->create()->id,
        'calidad_id' => Quality::factory()->create()->id,
        'url_foto' => 'https://example.com/image.jpg',
        'nomenclatura' => 'ABC123',
        'nombre_corto' => 'Producto ABC',
        'comentarios' => 'Descripción del producto',
    ];

    $catalogeProductCreateService = app(CatalogeProductCreateInterface::class);

    $createdCatalogeProduct = $catalogeProductCreateService->create($data);

    $catalogeProductId = $createdCatalogeProduct->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, CatalogeProductDeleteService)
    $catalogeProductDeleteService = app(CatalogeProductDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $catalogeProductDeleteService->delete($catalogeProductId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete CatalogeProduct Scenery: delete a non-existing CatalogeProduct', function () {
    // Configurar un ID ficticio para un CatalogeProduct que no existe
    $nonExistingCatalogeProductId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, CatalogeProductDeleteService)
    $catalogeProductDeleteService = app(CatalogeProductDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeProductDeleteService->delete($nonExistingCatalogeProductId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update CatalogeProduct Scenery: update an existing CatalogeProduct with correct data', function () {
    $product = Product::factory()->create();
    $data = [
        'producto_id' => $product->id,
        'tipo_id' => Type::factory()->create()->id,
        'tamano_id' => Size::factory()->create()->id,
        'marca_id' => Brand::factory()->create()->id,
        'presentacion_id' => Presentation::factory()->create()->id,
        'calidad_id' => Quality::factory()->create()->id,
        'url_foto' => 'https://example.com/image.jpg',
        'nomenclatura' => 'ABC123',
        'nombre_corto' => 'Producto ABC',
        'comentarios' => 'Descripción del producto',
    ];

    $catalogeProductCreateService = app(CatalogeProductCreateInterface::class);

    $createdCatalogeProduct = $catalogeProductCreateService->create($data);

    $catalogeProductId = $createdCatalogeProduct->id;

    $updatedData = [
        'url_foto' => 'https://example.com/updated-image.jpg',
        'comentarios' => 'Descripción actualizada',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, CatalogeProductUpdateService)
    $catalogeProductUpdateService = app(CatalogeProductUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $catalogeProductUpdateService->update($catalogeProductId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->url_foto)->toBe($updatedData['url_foto']);
    expect($result->comentarios)->toBe($updatedData['comentarios']);
});

it('Update CatalogeProduct Scenery: update an existing CatalogeProduct with invalid data', function () {
    $product = Product::factory()->create();
    $data = [
        'producto_id' => $product->id,
        'tipo_id' => Type::factory()->create()->id,
        'tamano_id' => Size::factory()->create()->id,
        'marca_id' => Brand::factory()->create()->id,
        'presentacion_id' => Presentation::factory()->create()->id,
        'calidad_id' => Quality::factory()->create()->id,
        'url_foto' => 'https://example.com/image.jpg',
        'nomenclatura' => 'ABC123',
        'nombre_corto' => 'Producto ABC',
        'comentarios' => 'Descripción del producto',
    ];

    $catalogeProductCreateService = app(CatalogeProductCreateInterface::class);

    $createdCatalogeProduct = $catalogeProductCreateService->create($data);

    $catalogeProductId = $createdCatalogeProduct->id;

    $updatedData = [
        'tipo_id' => 99, // Tipo no válido
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, CatalogeProductUpdateService)
    $catalogeProductUpdateService = app(CatalogeProductUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeProductUpdateService->update($catalogeProductId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Update CatalogeProduct Scenery: update a non-existing CatalogeProduct', function () {
    // Configurar un ID ficticio para un CatalogeProduct que no existe
    $nonExistingCatalogeProductId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'url_foto' => 'https://example.com/updated-image.jpg',
        'comentarios' => 'Descripción actualizada',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, CatalogeProductUpdateService)
    $catalogeProductUpdateService = app(CatalogeProductUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeProductUpdateService->update($nonExistingCatalogeProductId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
