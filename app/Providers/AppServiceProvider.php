<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::created (function($user) { 
            retry(5, function() use ($user){
         Mail:: to($user)->send(new UserCreated($user));  
         },100);
        });

         User::updated (function($user) { 
            if ($user -> isDirty('email')){
                
            Mail:: to($user)->send(new UserMailChanged($user));
            }  
            });


        Product::updated(function ($product) {
            if ($product->quantity == 0 && $product->isAvailable()) {
                $product->status = Product::UNAVAILABLE_PRODUCT;

                $product->save();
            }
    });

    /**
     * Register any application services.
     *
     * @return void
     */
 
}
    }
