<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Channel;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;

use App\Http\View\Composers\ChannelsComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class,function($app){
            if(request()->has('credit'))
            {
                return new CreditPaymentGateway('USD');
            }
            else
            {
                return new BankPaymentGateway('USD');
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Option 1 - For every single view 
        // View::share('channels', Channel::orderBy('name')->get());

        // Option 2 - For defined view OR Granular Views with wildcards
        // View::composer(['post.*','channel.index'], function($view){
            // $view->with('channels',Channel::orderBy('name')->get());
        // });

        // Option 3 - For Dedicated view
        // View::composer(['post.*','channel.index'], ChannelsComposer::class);
        View::composer('partials.channels.*', ChannelsComposer::class);
    }
}