<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Spr\P_dolgn;
use App\Models\Spr\P_payout;


class ProfileComposer
{
    /**
     * Работает в справочнике пользователей, вывод должностей и направлений
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('dolg', P_dolgn::all());
        $view->with('napr', P_payout::all());
    }
}
