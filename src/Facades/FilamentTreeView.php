<?php

namespace Cheesegrits\FilamentTreeView\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cheesegrits\FilamentTreeView\FilamentTreeView
 */
class FilamentTreeView extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Cheesegrits\FilamentTreeView\FilamentTreeView::class;
    }
}
