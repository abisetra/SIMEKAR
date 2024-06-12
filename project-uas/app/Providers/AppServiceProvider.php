<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\WebSettings;
use DB;

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
        $webSettings = WebSettings::first();
        if ($webSettings->logo_web === '') {
            $logoWeb = 'images\logo_web_default.png';
        } else {
            $logoWeb = $webSettings->logo_web;
        }


        config(['adminlte.logo' => '<b>' . $webSettings->nama_web . '</b>']);
        config(['adminlte.title' => $webSettings->nama_web]);
        config(['adminlte.title_prefix' => $webSettings->subnama_web]);
        config(['adminlte.logo_img' => asset('storage/' . $logoWeb)]);



        $this->register();

        Gate::define('admin', function ($user) {
            if ($user->role_id == '1') {
                return true;
            }
            return false;
        });

        Gate::define('direktur', function ($user) {
            if ($user->role_id == '2') {
                return true;
            }
            return false;
        });

        Gate::define('hrd', function ($user) {
            if ($user->role_id == '3') {
                return true;
            }
            return false;
        });

        Gate::define('karyawan', function ($user) {
            if ($user->role_id == '4') {
                return true;
            }
            return false;
        });
    }
}
