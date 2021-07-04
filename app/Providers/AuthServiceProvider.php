<?php

namespace App\Providers;

use App\User;
use App\Order;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });
        
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });

        Gate::define('checkPayment',function (User $user,Order $order){
      
            return $order->province_id && $order->city_id && $order->courier && $order->service != null;
        });
    }
}
