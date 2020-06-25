<?php

namespace Coreproc\LaravelDebugbarGitInfo;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class GitInfoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $debugbar = App::make('debugbar');
        $debugbar->addCollector(new GitInfoCollector());
    }
}
