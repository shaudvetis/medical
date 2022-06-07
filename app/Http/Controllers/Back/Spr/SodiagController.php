<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\SprRepository;
use DB;

class SodiagController extends Controller
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

        $payout_id =Auth::user()->p_payout_id;

        $diagnoses=$this->repository->diagnosesget($request,  $payout_id);
       
        $data = $request->session()->all();
   
      
        return view ('back.spr.sodiag.index', compact('diagnoses', 'payout_id'));
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
        'p_payout_id' => 'required|numeric',
    ]);
        
    $request->session()->put('p_payout_id', $request->p_payout_id);
      
    $query= $this->repository->diagnospost($request);
 
    return back()->with('component-ok', 'Діагноз додано...');
}

    /**
     * Обновление справочника диагнозов
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

       $query = $this->repository->diagnosupdate($request, $id);
       
       //Если запись вставлена в БД
        if ($query == 1){
         return back()->with('component-ok', 'Діагноз відкориговано...');
       }
       //Если запись невставлена в БД
       if ($query == 2){
        return back()->with('component-ok', 'Діагноз невідкориговано...');
       }
       return back();
    }

    /**
     * Удаление диагноза
     *
     * @param  int  $id
     */
    
     public function destroy(Request $request,$id)
    {
        $this->repository->diagnosdestroy($request, $id);

        return back()->with('component-ok', 'Діагноз видалено...');
    }
}
