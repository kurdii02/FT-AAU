<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Task::class => \App\Policies\TaskPolicy::class,
        \App\Models\TaskSubmission::class => \App\Policies\TaskSubmissionPolicy::class,
    ];
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
