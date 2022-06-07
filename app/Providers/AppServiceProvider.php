<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ProfileComposer;
use App\Http\ViewComposers\PoperComposer;
use App\Http\ViewComposers\NaprsoposComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Вівод перечня должностей и направления в справочник сотрудников
        view()->composer('back.spr.profile.index', ProfileComposer::class);
       //Вівод перечня должностей и направления в справочник сотрудников
       view()->composer('back.spr.p_oper.index', PoperComposer::class);
       //Вівод перечня должностей в справочник  узкий диагнозов
       view()->composer('back.spr.sodiag.index', PoperComposer::class);
       //Вывод перечня из справочника палат, оперблока. хирургов во вью с заполнением направления
       view()->composer('back.filter.refsurgery', NaprsoposComposer::class);
              //Вывод перечня направлений в карточку формирования направления
       view()->composer('back.filter.refsurgery', NaprsoposComposer::class);
     
    }
}
