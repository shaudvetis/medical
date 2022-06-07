<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\SprRepository;
use DB;

class PayoutController extends Controller
{

    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SprRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
       
    } 

    /**
     * Запуск справочника 
     *
     * 
     */
    public function index(Request $request)
    { 
        if (!Auth::check()) {
            return redirect()->route('start');
        }
        
        $p_payout=$this->repository->p_payoutget($request);

        return view ('back.spr.payout.index', compact('p_payout'));
    }

   
    /**
     *Запись справочника в БД
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {   
       $validated = $request->validate([
        'name' => 'required|max:255|string',
        'color' => 'nullable',
    ]);
 
        $this->repository->p_payoutpost($request);

        return back()->with('component-ok', 'Напрямок додано...');
    }

   
    /**
     * Обновление справочника направлений
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

       $query = $this->repository->p_payoutupdate($request, $id);
       
       //Если запись вставлена в БД
        if ($query == 1){
         return back()->with('component-ok', 'Напрямок відкориговано...');
       }
       //Если запись невставлена в БД
       if ($query == 2){
        return back()->with('component-ok', 'Напрямок невідкориговано...');
       }
       return back();
    }

    /**
     * Удаление направления
     *
     * @param  int  $id
     */
    
     public function destroy(Request $request,$id)
    {
        $this->repository->p_payoutdestroy($request, $id);

        return back()->with('component-ok', 'Напрямок видалено...');
    }
}
