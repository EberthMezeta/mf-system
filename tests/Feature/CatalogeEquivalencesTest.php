<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceCreateInterface;
use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceDeleteInterface;
use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceUpdateInterface;
use Src\CatalogeEquivalences\Domain\Model\CatalogeEquivalence;
use Src\Packaging\Domain\Model\Packaging;

uses(RefreshDatabase::class);

it('Create CatalogeEquivalence Scenery: Correct Data', function () {
    // Ajusta los datos de prueba aquí
    $data = [
        'catalogo_id' => 1,
        'cantidad_origen' => 100,
        'empaque_origen' => Packaging::factory()->create()->id,
        'cantidad_destino' => 200,
        'empaque_destino' => Packaging::factory()->create()->id,
        'es_empaque_compra' => true,
        'es_empaque_venta' => false,
        'utilidad_minima_empaque' => 10.5,
        'comentarios' => 'Descripción de la Equivalencia',
    ];

    $catalogeEquivalenceCreateService = app(CatalogeEquivalenceCreateInterface::class);

    $createdCatalogeEquivalence = $catalogeEquivalenceCreateService->create($data);

    expect($createdCatalogeEquivalence)->toBeInstanceOf(CatalogeEquivalence::class);
    // Ajusta las expectativas según los campos y valores que desees verificar
    expect($createdCatalogeEquivalence->catalogo_id)->toBe($data['catalogo_id']);
    expect($createdCatalogeEquivalence->cantidad_origen)->toBe($data['cantidad_origen']);
    expect($createdCatalogeEquivalence->empaque_origen)->toBe($data['empaque_origen']);
    // Agrega más expectativas para los otros campos...
});

it('Create CatalogeEquivalence Scenery: Empty Data', function () {
    $data = [];

    $catalogeEquivalenceCreateService = app(CatalogeEquivalenceCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeEquivalenceCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Create CatalogeEquivalence Scenery: Invalid Data', function () {
    // Configurar datos incorrectos (por ejemplo, falta el campo 'catalogo_id')
    $data = [
        'cantidad_origen' => 100,
        'empaque_origen' => 2,
        'cantidad_destino' => 200,
        'empaque_destino' => 3,
        'es_empaque_compra' => true,
        'es_empaque_venta' => false,
        'utilidad_minima_empaque' => 10.5,
        'comentarios' => 'Descripción de la Equivalencia',
    ];

    $catalogeEquivalenceCreateService = app(CatalogeEquivalenceCreateInterface::class);

    // Ejecutar el caso de uso y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeEquivalenceCreateService->create($data);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
    // Puedes realizar más aserciones si es necesario
});

it('Delete CatalogeEquivalence Scenery: delete an existing equivalence', function () {
    // Ajusta los datos de prueba aquí
    $data = [
        'catalogo_id' => 1,
        'cantidad_origen' => 100,
        'empaque_origen' => Packaging::factory()->create()->id,
        'cantidad_destino' => 200,
        'empaque_destino' => Packaging::factory()->create()->id,
        'es_empaque_compra' => true,
        'es_empaque_venta' => false,
        'utilidad_minima_empaque' => 10.5,
        'comentarios' => 'Descripción de la Equivalencia',
    ];

    $catalogeEquivalenceCreateService = app(CatalogeEquivalenceCreateInterface::class);

    $createdCatalogeEquivalence = $catalogeEquivalenceCreateService->create($data);

    $equivalenceId = $createdCatalogeEquivalence->id;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, CatalogeEquivalenceDeleteService)
    $catalogeEquivalenceDeleteService = app(CatalogeEquivalenceDeleteInterface::class);

    // Ejecutar el servicio de eliminación
    $result = $catalogeEquivalenceDeleteService->delete($equivalenceId);

    // Verificar que la eliminación sea exitosa
    expect($result)->toBeNull();
});

it('Delete CatalogeEquivalence Scenery: delete a non-existing equivalence', function () {
    // Configurar un ID ficticio para una equivalencia que no existe
    $nonExistingEquivalenceId = 999;

    // Obtener una instancia de tu servicio de eliminación (por ejemplo, CatalogeEquivalenceDeleteService)
    $catalogeEquivalenceDeleteService = app(CatalogeEquivalenceDeleteInterface::class);

    // Ejecutar el servicio de eliminación y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeEquivalenceDeleteService->delete($nonExistingEquivalenceId);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update CatalogeEquivalence Scenery: update an existing equivalence with correct data', function () {
    // Ajusta los datos de prueba aquí
    $data = [
        'catalogo_id' => 1,
        'cantidad_origen' => 100,
        'empaque_origen' => Packaging::factory()->create()->id,
        'cantidad_destino' => 200,
        'empaque_destino' => Packaging::factory()->create()->id,
        'es_empaque_compra' => true,
        'es_empaque_venta' => false,
        'utilidad_minima_empaque' => 10.5,
        'comentarios' => 'Descripción de la Equivalencia',
    ];

    $catalogeEquivalenceCreateService = app(CatalogeEquivalenceCreateInterface::class);

    $createdCatalogeEquivalence = $catalogeEquivalenceCreateService->create($data);

    $equivalenceId = $createdCatalogeEquivalence->id;

    $updatedData = [
        'cantidad_origen' => 150,
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, CatalogeEquivalenceUpdateService)
    $catalogeEquivalenceUpdateService = app(CatalogeEquivalenceUpdateInterface::class);

    // Ejecutar el servicio de actualización
    $result = $catalogeEquivalenceUpdateService->update($equivalenceId, $updatedData);

    // Verificar que la actualización sea exitosa
    expect($result->cantidad_origen)->toBe($updatedData['cantidad_origen']);
    expect($result->comentarios)->toBe($updatedData['comentarios']);
});

it('Update CatalogeEquivalence Scenery: update an existing equivalence with invalid data', function () {
    // Ajusta los datos de prueba aquí
    $data = [
        'catalogo_id' => 1,
        'cantidad_origen' => 100,
        'empaque_origen' => Packaging::factory()->create()->id,
        'cantidad_destino' => 200,
        'empaque_destino' => Packaging::factory()->create()->id,
        'es_empaque_compra' => true,
        'es_empaque_venta' => false,
        'utilidad_minima_empaque' => 10.5,
        'comentarios' => 'Descripción de la Equivalencia',
    ];

    $catalogeEquivalenceCreateService = app(CatalogeEquivalenceCreateInterface::class);

    $createdCatalogeEquivalence = $catalogeEquivalenceCreateService->create($data);

    $equivalenceId = $createdCatalogeEquivalence->id;

    $updatedData = [
        'cantidad_origen' => 'Invalid Data', // Por ejemplo, cantidad_origen debe ser un número
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, CatalogeEquivalenceUpdateService)
    $catalogeEquivalenceUpdateService = app(CatalogeEquivalenceUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeEquivalenceUpdateService->update($equivalenceId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});

it('Update CatalogeEquivalence Scenery: update a non-existing equivalence', function () {
    // Configurar un ID ficticio para una equivalencia que no existe
    $nonExistingEquivalenceId = 999;

    // Configurar los datos de actualización
    $updatedData = [
        'cantidad_origen' => 150,
        'comentarios' => 'Nueva Descripción',
    ];

    // Obtener una instancia de tu servicio de actualización (por ejemplo, CatalogeEquivalenceUpdateService)
    $catalogeEquivalenceUpdateService = app(CatalogeEquivalenceUpdateInterface::class);

    // Ejecutar el servicio de actualización y capturar la excepción
    $exceptionThrown = false;
    try {
        $catalogeEquivalenceUpdateService->update($nonExistingEquivalenceId, $updatedData);
    } catch (\Exception $e) {
        $exceptionThrown = true;
    }

    // Verificar que se haya lanzado una excepción
    expect($exceptionThrown)->toBeTrue();
});
