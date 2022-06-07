<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{
    Spr\Palat,
    Spr\P_oper,
    Spr\P_operblock,
    Spr\P_payout,
    User
};

use DB;

class NaprsoposComposer
{
    /**
     * Работает в справочнике операций
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('palat', Palat::all());

        $view->with('oper', P_oper::select('id','u2name', 'p_payout', 'timeoper','timegos')->orderby('u2name', 'asc')->toBase()->get());

        $view->with('operbl', P_operblock::all());

        $view->with('user1', User::where('isxcode', '1')->toBase()->get());

        $view->with('p_payout', P_payout::select('id','name')->toBase()->get());

        // $view->with('mkb', DB::select('select icd_group.* from  icd_group order by ur1, gr1,gr2, gr3'));

        // $view->with('mkb1', DB::select('select icd_diagnoses.* from  icd_diagnoses '));

    }
} 
