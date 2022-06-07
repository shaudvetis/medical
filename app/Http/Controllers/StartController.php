<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Spr\P_oper;
use App\Models\Medical\Planbag;
use App\Models\Spr\P_bag;
use App\Models\Spr\IcdGroup;
use DB;
use Auth;

class StartController extends Controller
{


        /**
     * Create a new view for creating a new product in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
      if(!Auth::check()) {
         $user=User::select('id','surname', 'name','fullname')->orderby('surname','asc')->get();
         return view('start', compact('user'));
      }
             // return view('auth.login');
             $user=User::select('id','surname', 'name','fullname')->orderby('surname','asc')->get();
             return view('start', compact('user'));

    }


        /**
     * Create a new view for creating a new product in storage.
     * В сессию отправляем все операции при загрузке формы
     * @param  ...
     * @return \Illuminate\Http\Response
     */
    public function medical()
    {
      if(!Auth::check()) {
         return redirect()->route('start');
      }

        $alloper= P_oper::select('id','u2name', 'p_payout', 'timeoper','timegos')->orderby('u2name', 'asc')->toBase()->get();

        $bag = P_bag::all();
        //Дата сегодня
        $dat = Carbon::now()->format('Y-m-d');

        //Дата последняя с таблицы
        $plan = Planbag::orderby('id', 'desc')->first();
        //Прибавляем один день
        $x = Carbon::parse($plan->data)->addDay(1)->format('Y-m-d');

        //Разница между датами получаем
        $rt=date_diff(Carbon::parse($dat), Carbon::parse($x));
        //Конкретное число
        $y= $rt->days;

        //если меньше 15 дней
        if ($y < 60 ){

            //К последней дате добавляем нужные 60 дней
            $dat1 = Carbon::parse($x)->addDay(60)->format('Y-m-d');
            // Созадем период от последней даты в таблице + 1 день и нужные 60 дней
            $period = CarbonPeriod::create($x,  $dat1);
            foreach ($period as $key => $item) {
                $datax = $item->format('Y-m-d');
                foreach ($bag as $key => $bags){
                    Planbag::create([
                        'data' => $datax,
                        'palat_id' => $bags->palat_id,
                        'bag_id' => $bags->id,
                        'bag_name' => $bags->num_bags,
                        'palat_name' =>$bags->palat_name
                    ]);
                }

            }
        }


        $alloper= P_oper::select('id','u2name', 'p_payout', 'timeoper','timegos')->orderby('u2name', 'asc')->toBase()->get();

   session(['alloper' => $alloper]);

   // $mkb_group = Cache::rememberForever('mkb_group', function() {
   //      return IcdGroup::where('parent_id', 0)
   //       ->with('children')
   //       ->get();
   //      });

// dd($value);
// exit();

       return view('medical');
    }

}

