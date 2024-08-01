<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Model;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Below we make sure that all
        // columns in Models' tables are
        // fillable/unguarded
        Model::unguard();

        //Enable the database query log
        // DB::listen(function ($query) {
        //     Log::info($query->sql, ['bindings' => $query->bindings, 'time' => $query->time]);
        // });


    }
}
