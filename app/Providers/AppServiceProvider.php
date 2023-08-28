<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Families\Application\Contracts\FamilyCreateInterface;
use Src\Families\Application\Contracts\FamilyReadInterface;
use Src\Families\Application\UseCases\CreateFamilyUseCase;
use Src\Families\Application\UseCases\DeleteFamilyUseCase;
use Src\Families\Application\UseCases\ReadFamilyUseCase;
use Src\Families\Application\UseCases\UpdateFamilyUseCase;
use Src\Families\Domain\Repository\FamilyRepositoryInterface;
use Src\Families\Infraestructure\Persistence\EloquentFamilyRepository;

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

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
