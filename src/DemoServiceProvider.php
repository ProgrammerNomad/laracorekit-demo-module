<?php

namespace LaraCoreKit\DemoModule;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use LaraCoreKit\DemoModule\Console\Commands\ResetDemoDatabase;
use LaraCoreKit\DemoModule\Filament\Widgets\DemoBannerWidget;
use LaraCoreKit\DemoModule\Http\Middleware\BlockDemoActions;
use LaraCoreKit\DemoModule\Http\Middleware\DemoModeMiddleware;

class DemoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/demo.php', 'demo');
    }

    public function boot(): void
    {
        if (! config('demo.enabled')) {
            return;
        }

        $this->validateDemoHost();

        $this->loadViewsFrom(__DIR__.'/../views', 'demo');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ResetDemoDatabase::class,
            ]);

            $this->publishes([
                __DIR__.'/../config/demo.php' => config_path('demo.php'),
            ], 'demo-config');
        }

        $router = $this->app['router'];
        $router->aliasMiddleware('demo', DemoModeMiddleware::class);
        $router->aliasMiddleware('demo.block', BlockDemoActions::class);

        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('demo:reset --force')
                ->cron('*/'.config('demo.reset_interval').' * * * *')
                ->withoutOverlapping()
                ->runInBackground()
                ->onFailure(fn () => \Log::error('Demo reset failed'));
        });

        Gate::before(function ($user, $ability) {
            if (in_array($ability, config('demo.blocked_actions', []))) {
                return false;
            }
        });

        Blade::component('demo::components.login-banner', 'demo-login-banner');
    }

    protected function validateDemoHost(): void
    {
        if ($this->app->environment('production')) {
            $host = request()->getHost();
            if (! in_array($host, config('demo.allowed_hosts', []))) {
                abort(403, 'Demo mode not allowed on this domain');
            }
        }
    }
}
