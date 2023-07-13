<?php

namespace Cheesegrits\FilamentTreeView;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentTreeViewPlugin implements Plugin
{
    protected static string $name = 'filament-tree-view-plugin';

    public function getId(): string
    {
        return static::$name;
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }
}
