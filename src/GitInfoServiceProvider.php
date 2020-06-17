<?php

namespace Coreproc\LaravelDebugbarGitInfo;

use Coreproc\LaravelDebugbarGitInfo\GitInfoCollector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class GitInfoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $debugbar = App::make('debugbar');
        $debugbar->addCollector(new GitInfoCollector());
    }
}

