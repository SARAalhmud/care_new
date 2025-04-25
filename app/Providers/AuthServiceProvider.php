<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // تحقق من ما إذا كان المستخدم هو "admin"
    Gate::define('isAdmin', function ($user) {
        return $user->role === 'admin';
    });

    // تحقق من ما إذا كان المستخدم هو "seller"
    Gate::define('isSeller', function ($user) {
        return $user->role === 'seller';
    });

    // تحقق من ما إذا كان المستخدم هو "user"
    Gate::define('isUser', function ($user) {
        return $user->role === 'user';
    });
    }
}
