<?php
/**
 * Created by PhpStorm.
 * User: Cookiesoft
 * Date: 10/11/2017
 * Time: 23:09
 */

namespace Modules\Pages\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{

    public function boot(){

        Route::namespace('Modules\Pages\Http\Controllers')
                    ->middleware(['web'])
                    ->group(__DIR__ . '/../Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Views','Page');

        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Lang','Page');

        $this->publishes([
            __DIR__ . '/../Views' => resource_path('views/vendor/Page')
        ], 'views');

        $this->publishes([
            __DIR__.'/../Lang' => resource_path('lang/vendor/Page'),
        ], 'lang');

        // Se eu quisesse criar um arquivo dentro de um diretorio do laravel, nesse caso vai ser criado um
        // arquivo pages.php dentro do diretorio config
        $this->publishes([
            __DIR__.'/../config/pages.php' => config_path('pages.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../public/assets/style.css' => public_path('vendor/style.css'),
        ], 'public');

    }

    public function register(){

        $this->mergeConfigFrom(
            __DIR__.'/../config/pages.php',
            'pages'
        );
    }

}