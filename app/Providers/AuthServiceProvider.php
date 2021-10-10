<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

            Gate::define('update-post',function(User $user , Post $post){
                // if($user->id === $post->user_id){
                //     return true;
                // }else{
                //     return false;
                // }

                return $user->id === $post->user_id;
            });

            Gate::define('delete-post',function(User $user , Post $post){
                // if($user->id === $post->user_id){
                //     return true;
                // }else{
                //     return false;
                // }

                return $user->id === $post->user_id | $user->role == 'admin';
            });

            Gate::define('delete-user',function(User $user ){
                if($user->role =='admin'){
                    return true;
                }else{
                    return false;
                }

                // return $user->id === $user_id | $user->role == 'admin';
            });
    }
}
