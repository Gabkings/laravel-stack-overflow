<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Questions;
Use App\Policies\QuestionsPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Questions::class => QuestionsPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        \Gate::define('update_question', function($user, $question){
            return $user->id === $question->user_id;
        });

        \Gate::define('delete_question', function($user, $question){
            return $user->id === $question->user_id;
        });
        $this->registerPolicies();

        //
    }
}
