<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Routing\ResponseFactory;

use App\Channel;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;

use App\PostcardSendingService;
use App\Mixins\StrMixins;

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
        View::share('channels', Channel::orderBy('name')->get());

        // Option 2 - For defined view OR Granular Views with wildcards
        // View::composer(['post.*','channel.index'], function($view){
            // $view->with('channels',Channel::orderBy('name')->get());
        // });

        // Option 3 - For Dedicated view
        // View::composer(['post.*','channel.index'], ChannelsComposer::class);
        View::composer('partials.channels.*', ChannelsComposer::class);

        // *.*.* Facades implementation *.*.* //
        $this->app->singleton('postCard', function ($app){
            return new PostcardSendingService('PAK', 14, 1947);
        });

        // *.*.* Macros implementation *.*.* //
        Str::macro('partNum', function ($pNum) {
            return 'ABC-' . substr($pNum, 0, 3) . '-' . substr($pNum, 3);
        });

        Str::mixin(new StrMixins(), false);

        ResponseFactory::macro('errorJson', function ($message = 'Something went wrong') {
            return 
            [
                'message' => $message,
                'error_code' => '123'
            ];
        });
    }
}