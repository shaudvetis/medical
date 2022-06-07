<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\SprRepository;
use DB;

class SprrizkiController extends Controller
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
        $rizki=$this->repository->rizkget($request);
       
       
        return view ('back.spr.sorizk.index', compact('rizki'));
    }

    /**
     * Запуск справочника 
     *
     * 
     */
    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('start');
        }
     
     $rizki=$this->repository->rizkget3($request);
       
       
        return view ('back.spr.sorizk.sprtrombo', compact('rizki'));
    }

   
    /**
     *Запись справочника в БД
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {   
       $validated = $request->validate([
        'nametromb2' => 'required|max:255|string',
        'nball' => 'nullable|numeric',
        'ngroup' => 'nullable|numeric',
        'cnumeric' => 'nullable|numeric',
    ]);
        
     $query= $this->repository->rizkpost($request);
 
    return back()->with('component-ok', 'Ризки додано...');
}

    /**
     * Запуск справочника 
     *
     * 
     */
    public function edit(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('start');
        }
        if($id==3) {
         $rizki=$this->repository->rizkget3($request, $id);
         return view ('back.spr.sorizk.sprtrombo', compact('rizki'));
    }
     
        if($id==5) {
         $rizki=$this->repository->rizkget3($request, $id);
         return view ('back.spr.sorizk.sprantib', compact('rizki'));
    }
        if($id==6) {
         $rizki=$this->repository->rizkget3($request, $id);
         return view ('back.spr.sorizk.sprother', compact('rizki'));
    }
    }

    /**
     * Обновление справочника диагнозов
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
   

    $query = $this->repository->rizkupdate($request, $id);
       
       //Если запись вставлена в БД
        if ($query == 1){
         return back()->with('component-ok', 'Ризки відкориговано...');
       }
       //Если запись невставлена в БД
       if ($query == 2){
        return back()->with('component-ok', 'Ризки невідкориговано...');
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
        $this->repository->rizkdestroy($request, $id);

        return back()->with('component-ok', 'Ризки видалено...');
    }
}
