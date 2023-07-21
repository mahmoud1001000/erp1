<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
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

        Gate::before(function ($user, $ability) {
            $administrator_list = config('constants.administrator_usernames');
            if (in_array($ability, ['backup', 'superadmin','manage_modules','supperuser'])) {
                if (in_array($user->username, explode(',', $administrator_list))) {
                    return true;
                }
            } else {
               // dd($user->username,$ability,$administrator_list,'Admin#' . $user->business_id,$user->hasRole('Admin#' . $user->business_id));
                if ($user->hasRole('Admin#' . $user->business_id)) {
                    return true;
                }
            }
        });
    }
}
