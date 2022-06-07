<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Spr\P_payout;


class PoperComposer
{
    /**
     * Работает в справочнике операций
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('napr', P_payout::all());
    }
} 
