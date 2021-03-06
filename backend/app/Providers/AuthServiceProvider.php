<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Route::group(['middleware' => 'api'], function () {
            Passport::routes(function ($router) {
                return $router->forAccessTokens();
            });
        });
        Passport::tokensExpireIn(Carbon::now()->addMinute(100));

        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        //
    }
}
