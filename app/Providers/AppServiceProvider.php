<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('exact_dimensions', function ($attribute, $value, $parameters, $validator) {
            [$width, $height] = getimagesize($value);
    
            return $width === 800 && $height === 800;
        });
    
        Validator::replacer('exact_dimensions', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ' :attribute harus berukuran 800x800 pixels.');
        });
        

        Validator::extend('gambar_produk', function ($attribute, $value, $parameters, $validator) {
            [$width, $height] = getimagesize($value);
    
            return $width === 600 && $height === 800;
        });
    
        Validator::replacer('gambar_produk', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ' :attribute harus berukuran 600x800 pixels.');
        });
    }
}
