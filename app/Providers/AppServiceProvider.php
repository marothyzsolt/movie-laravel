<?php

namespace App\Providers;

use App\Services\Contracts\MafabServiceInterface;
use App\Services\MafabService;
use Illuminate\Support\ServiceProvider;
use PoLaKoSz\Mafab\Search;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MafabServiceInterface::class, function ($app) {
            //return new MafabService(new Search());
            return $app->make(MafabService::class);
        });

        \Response::macro('dataJson', function (bool $error, ?array $data) {
            return response()->json([
                'error' => $error,
                'data' => $data
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
