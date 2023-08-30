<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Families\Application\Contracts\FamilyCreateInterface;
use Src\Families\Application\Contracts\FamilyReadInterface;
use Src\Families\Application\Contracts\FamilyUpdateInterface;
use Src\Families\Application\Contracts\FamilyDeleteInterface;

use Src\Families\Application\UseCases\CreateFamilyUseCase;
use Src\Families\Application\UseCases\DeleteFamilyUseCase;
use Src\Families\Application\UseCases\ReadFamilyUseCase;
use Src\Families\Application\UseCases\UpdateFamilyUseCase;

use Src\Families\Domain\Repository\FamilyRepositoryInterface;
use Src\Families\Infraestructure\Persistence\EloquentFamilyRepository;

use Src\Brands\Application\Contracts\BrandCreateInterface;
use Src\Brands\Application\Contracts\BrandDeleteInterface;
use Src\Brands\Application\Contracts\BrandUpdateInterface;

use Src\Brands\Application\UseCases\CreateBrandUseCase;
use Src\Brands\Application\UseCases\DeleteBrandUseCase;
use Src\Brands\Application\UseCases\UpdateBrandUseCase;
use Src\Brands\Infraestructure\Persistence\EloquentBrandRepository;
use Src\Brands\Domain\Repository\BrandRepositoryInterface;
use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceCreateInterface;
use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceDeleteInterface;
use Src\CatalogeEquivalences\Application\Contracts\CatalogeEquivalenceUpdateInterface;
use Src\CatalogeEquivalences\Application\UseCases\CreateCatalogeEquivalenceUseCase;
use Src\CatalogeEquivalences\Application\UseCases\DeleteCatalogeEquivalenceUseCase;
use Src\CatalogeEquivalences\Application\UseCases\UpdateCatalogeEquivalenceUseCase;
use Src\CatalogeEquivalences\Domain\Repository\CatalogeEquivalenceRepositoryInterface;
use Src\CatalogeEquivalences\Infraestructure\Persistence\EloquentCatalogeEquivalenceRepository;
use Src\CatalogeProducts\Application\Contracts\CatalogeProductCreateInterface;
use Src\CatalogeProducts\Application\Contracts\CatalogeProductDeleteInterface;
use Src\CatalogeProducts\Application\Contracts\CatalogeProductUpdateInterface;
use Src\CatalogeProducts\Application\UseCases\CreateCatalogeProductUseCase;
use Src\CatalogeProducts\Application\UseCases\DeleteCatalogeProductUseCase;
use Src\CatalogeProducts\Application\UseCases\UpdateCatalogeProductUseCase;
use Src\CatalogeProducts\Domain\Repository\CatalogeProductRepositoryInterface;
use Src\CatalogeProducts\Infraestructure\Persistence\EloquentCatalogeProductRepository;
use Src\Packaging\Application\Contracts\PackagingCreateInterface;
use Src\Packaging\Application\Contracts\PackagingDeleteInterface;
use Src\Packaging\Application\Contracts\PackagingUpdateInterface;
use Src\Packaging\Application\UseCases\CreatePackagingUseCase;
use Src\Packaging\Application\UseCases\DeletePackagingUseCase;
use Src\Packaging\Application\UseCases\UpdatePackagingUseCase;
use Src\Packaging\Domain\Repository\PackagingRepositoryInterface;
use Src\Packaging\Infraestructure\Persistence\EloquentPackagingRepository;
use Src\Presentations\Application\Contracts\PresentationCreateInterface;
use Src\Presentations\Application\Contracts\PresentationDeleteInterface;
use Src\Presentations\Application\Contracts\PresentationUpdateInterface;
use Src\Presentations\Application\UseCases\CreatePresentationUseCase;
use Src\Presentations\Application\UseCases\DeletePresentationUseCase;
use Src\Presentations\Application\UseCases\UpdatePresentationUseCase;
use Src\Presentations\Domain\Repository\PresentationRepositoryInterface;
use Src\Presentations\Infraestructure\Persistence\EloquentPresentationRepository;
use Src\Products\Application\Contracts\ProductCreateInterface;
use Src\Products\Application\Contracts\ProductDeleteInterface;
use Src\Products\Application\Contracts\ProductUpdateInterface;
use Src\Products\Application\UseCases\CreateProductUseCase;
use Src\Products\Application\UseCases\DeleteProductUseCase;
use Src\Products\Application\UseCases\UpdateProductUseCase;
use Src\Products\Domain\Repository\ProductRepositoryInterface;
use Src\Products\Infraestructure\Persistence\EloquentProductRepository;
use Src\Qualities\Application\Contracts\QualityCreateInterface;
use Src\Qualities\Application\Contracts\QualityDeleteInterface;
use Src\Qualities\Application\Contracts\QualityUpdateInterface;
use Src\Qualities\Application\UseCases\CreateQualityUseCase;
use Src\Qualities\Application\UseCases\DeleteQualityUseCase;
use Src\Qualities\Application\UseCases\UpdateQualityUseCase;
use Src\Qualities\Domain\Repository\QualityRepositoryInterface;
use Src\Qualities\Infraestructure\Persistence\EloquentQualityRepository;
use Src\Sizes\Application\Contracts\SizeCreateInterface;
use Src\Sizes\Application\Contracts\SizeDeleteInterface;
use Src\Sizes\Application\Contracts\SizeUpdateInterface;

use Src\Sizes\Application\UseCases\CreateSizeUseCase;
use Src\Sizes\Application\UseCases\DeleteSizeUseCase;
use Src\Sizes\Application\UseCases\UpdateSizeUseCase;

use Src\Sizes\Domain\Repository\SizeRepositoryInterface;
use Src\Sizes\Infraestructure\Persistence\EloquentSizeRepository;
use Src\Types\Application\Contracts\TypeCreateInterface;
use Src\Types\Application\Contracts\TypeDeleteInterface;
use Src\Types\Application\Contracts\TypeUpdateInterface;
use Src\Types\Application\UseCases\CreateTypeUseCase;
use Src\Types\Application\UseCases\DeleteTypeUseCase;
use Src\Types\Application\UseCases\UpdateTypeUseCase;
use Src\Types\Domain\Repository\TypeRepositoryInterface;
use Src\Types\Infraestructure\Persistence\EloquentTypeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FamilyCreateInterface::class, CreateFamilyUseCase::class);
        $this->app->bind(FamilyReadInterface::class, ReadFamilyUseCase::class);
        $this->app->bind(FamilyUpdateInterface::class, UpdateFamilyUseCase::class);
        $this->app->bind(FamilyDeleteInterface::class, DeleteFamilyUseCase::class);

// ... y así sucesivamente para las demás interface

        $this->app->bind(FamilyRepositoryInterface::class, EloquentFamilyRepository::class);

        $this->app->bind(BrandCreateInterface::class, CreateBrandUseCase::class);
        $this->app->bind(BrandDeleteInterface::class, DeleteBrandUseCase::class);
        $this->app->bind(BrandUpdateInterface::class, UpdateBrandUseCase::class);

        $this->app->bind(BrandRepositoryInterface::class, EloquentBrandRepository::class);

        $this->app->bind(SizeCreateInterface::class, CreateSizeUseCase::class);
        $this->app->bind(SizeDeleteInterface::class, DeleteSizeUseCase::class);
        $this->app->bind(SizeUpdateInterface::class, UpdateSizeUseCase::class);

        $this->app->bind(SizeRepositoryInterface::class,   EloquentSizeRepository::class);

        $this->app->bind(PresentationCreateInterface::class, CreatePresentationUseCase::class);
        $this->app->bind(PresentationDeleteInterface::class, DeletePresentationUseCase::class);
        $this->app->bind(PresentationUpdateInterface::class, UpdatePresentationUseCase::class);

        $this->app->bind(PresentationRepositoryInterface::class,EloquentPresentationRepository::class);

        $this->app->bind(QualityCreateInterface::class, CreateQualityUseCase::class);
        $this->app->bind(QualityDeleteInterface::class, DeleteQualityUseCase::class);
        $this->app->bind(QualityUpdateInterface::class, UpdateQualityUseCase::class);

        $this->app->bind(QualityRepositoryInterface::class,EloquentQualityRepository::class);


        $this->app->bind(TypeCreateInterface::class, CreateTypeUseCase::class);
        $this->app->bind(TypeDeleteInterface::class, DeleteTypeUseCase::class);
        $this->app->bind(TypeUpdateInterface::class, UpdateTypeUseCase::class);

        $this->app->bind(TypeRepositoryInterface::class,EloquentTypeRepository::class);



        $this->app->bind(ProductCreateInterface::class, CreateProductUseCase::class);
        $this->app->bind(ProductDeleteInterface::class, DeleteProductUseCase::class);
        $this->app->bind(ProductUpdateInterface::class, UpdateProductUseCase::class);

        $this->app->bind(ProductRepositoryInterface::class,EloquentProductRepository::class);

        $this->app->bind(CatalogeProductCreateInterface::class, CreateCatalogeProductUseCase::class);
        $this->app->bind(CatalogeProductDeleteInterface::class, DeleteCatalogeProductUseCase::class);
        $this->app->bind(CatalogeProductUpdateInterface::class, UpdateCatalogeProductUseCase::class);

        $this->app->bind(CatalogeProductRepositoryInterface::class,EloquentCatalogeProductRepository::class);


        $this->app->bind(PackagingCreateInterface::class, CreatePackagingUseCase::class);
        $this->app->bind(PackagingDeleteInterface::class, DeletePackagingUseCase::class);
        $this->app->bind(PackagingUpdateInterface::class, UpdatePackagingUseCase::class);

        $this->app->bind(PackagingRepositoryInterface::class,EloquentPackagingRepository::class);


        $this->app->bind(CatalogeEquivalenceCreateInterface::class, CreateCatalogeEquivalenceUseCase::class);
        $this->app->bind(CatalogeEquivalenceDeleteInterface::class, DeleteCatalogeEquivalenceUseCase::class);
        $this->app->bind(CatalogeEquivalenceUpdateInterface::class, UpdateCatalogeEquivalenceUseCase::class);

        $this->app->bind(CatalogeEquivalenceRepositoryInterface::class,EloquentCatalogeEquivalenceRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
