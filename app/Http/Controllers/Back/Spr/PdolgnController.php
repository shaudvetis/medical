<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\SprRepository;

class PdolgnController extends Controller
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
     * Запрос на все записи должностей
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('start');
        }
        
        $pdolgn=$this->repository->pdolgnget($request);

        return view ('back.spr.p_dolgn.index', compact('pdolgn'));
    }

    /**
     * Запрос на запись новой должности
     *
     * @param  \Illuminate\Http\Request  $request
     */
   
     public function store(Request $request)
    {   
        $validated = $request->validate([
            'dolgname' => 'required|max:255|bail',
        ]);
      
        $pdolgn=$this->repository->pdolgnpost($request);
        
      return back();
    }


    /**
     * Запрос на обновление справочника должностей
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $query = $this->repository->pdolgnupdate($request, $id);
       
        //Если запись вставлена в БД
         if ($query == 1){
          return back()->with('component-ok', 'Посаду відкориговано...');
        }
        //Если запись невставлена в БД
        if ($query == 2){
         return back()->with('component-ok', 'Посаду невідкориговано...');
        }
        return back();
    }

    /**
     * Удаление должности
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->pdolgndestroy($request, $id);

        return back()->with('component-ok', 'Посада видалено...');
    }
}
