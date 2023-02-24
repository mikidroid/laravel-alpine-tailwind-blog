<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        app()->bind(Newsletter::class,function(){
            $client = (new ApiClient())->setConfig([
                'apiKey' => env('MAILCHIMP_API'),
                'server' => 'us12'
                ]);
            return new Newsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('admin',function(User $user){
            return $user->email==="michaelphardy00@gmail.com";
        });
    }
}
