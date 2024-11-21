<?php

namespace App\Providers;

use App\Http\Controllers\LabelsController;
use App\Models\Labels;
use App\Models\Statuses;
use App\Models\Task;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->isLocal()) {
        } else {
            URL::forceScheme('https');
        }

        View::share('задача', Task::class);


        View::share('статусы', Statuses::class);

        View::share('задача', Labels::class);
    }
}
