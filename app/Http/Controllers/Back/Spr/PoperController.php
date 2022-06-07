<?php

namespace App\Http\Controllers\Back\Spr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SprRepository;
use Auth;

class PoperController extends Controller
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
     * Создание новой операции.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('start');
        }
        
       $payout_id =Auth::user()->p_payout_id;

        $oper=$this->repository->operget($request,$payout_id );
 
     
    //   dump($oper);
    //   exit();
        return view ('back.spr.p_oper.index', compact('oper'));
    }

    /**
     * Додавання назви операції
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'u2name' => 'max:255|required|string',
            'p_payout' => 'required|max:255|bail|numeric',
            'su_price' => 'nullable',
            'timegos' => 'nullable',
            'timeoper' => 'nullable',
       ]);

       $this->repository->operpost($request);
        
    return back()->with('component-ok', 'Назву операції додано...');

   }

    /**
     * Обновление справочника операций
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    $this->repository->operupdate($request, $id);
        
    return back()->with('component-ok', 'Назву операції відредаговано...');

    }

    /**
     * Удаление справочника операций
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->operdestroy($request, $id);
        
        return back()->with('component-ok', 'Назву операції видалено...');
    
    }
}
