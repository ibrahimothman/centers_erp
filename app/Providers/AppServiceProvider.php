<?php

namespace App\Providers;

use App\Center;
use App\helper\mathParser\Math;
use App\HourlyModel;
use App\MonthlyModel;
use App\SalaryModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use mysql_xdevapi\Session;
use phpDocumentor\Reflection\Types\This;
use function foo\func;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('filterByAccount', function($account){
            return $this->filter(function ($value) use ($account){
                return $value['account'] == $account;
            });

        });




    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Resource::withoutWrapping();
    }
}
