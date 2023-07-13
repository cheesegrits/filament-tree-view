<?php

namespace Cheesegrits\FilamentTreeView;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Filament\Support\Icons\Icon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Testing\TestableLivewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Cheesegrits\FilamentTreeView\Commands\FilamentTreeViewCommand;
use Cheesegrits\FilamentTreeView\Testing\TestsFilamentTreeView;

class FilamentTreeViewServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-tree-view';

    public static string $viewNamespace = 'filament-tree-view';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('cheesegrits/filament-tree-view');
            });

        $configFileName = $package->shortName();

        if (file_exists($this->package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($this->package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($this->package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($this->package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function boot(): void
    {
        parent::boot();

        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackage()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackage()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-tree-view/{$file->getFilename()}"),
                ], 'filament-tree-view-stubs');
            }
        }

        // Testing
        TestableLivewire::mixin(new TestsFilamentTreeView());
    }

    protected function getAssetPackage(): ?string
    {
        return 'cheesegrits/filament-tree-view';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-tree-view', __DIR__ . '/../resources/dist/components/filament-tree-view.js'),
            Css::make('filament-tree-view-styles', __DIR__ . '/../resources/dist/filament-tree-view.js'),
            Js::make('filament-tree-view-scripts', __DIR__ . '/../resources/dist/filament-tree-view.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentTreeViewCommand::class,
        ];
    }

    /**
     * @return array<string, Icon>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-tree-view_table',
        ];
    }
}
