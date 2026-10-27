<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Hewan;
use App\Policies\HewanPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Hewan::class => HewanPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define gates jika perlu
        Gate::define('manage-all-hewans', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('manage-own-hewans', function ($user, $hewan) {
            return $hewan->user_id === $user->id;
        });
    }
}