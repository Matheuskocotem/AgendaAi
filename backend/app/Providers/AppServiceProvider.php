<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Bind de repositórios
        $this->app->bind(RoomRepository::class, function ($app) {
            return new RoomRepository($app->make('App\Models\Room'));
        });

        $this->app->bind(MeetingRepository::class, function ($app) {
            return new MeetingRepository($app->make('App\Models\Meeting'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
