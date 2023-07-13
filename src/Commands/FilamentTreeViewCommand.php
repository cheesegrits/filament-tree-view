<?php

namespace Cheesegrits\FilamentTreeView\Commands;

use Illuminate\Console\Command;

class FilamentTreeViewCommand extends Command
{
    public $signature = 'filament-tree-view';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
