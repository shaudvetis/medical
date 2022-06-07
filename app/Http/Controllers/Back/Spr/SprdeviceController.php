<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\SprRepository;
use DB;

class SprdeviceController extends Controller
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
        
        $sodevice=$this->repository->sodeviceget($request);
       
        return view ('back.spr.sodevice.index', compact('sodevice'));
    }

   
    /**
     *Запись справочника уник оборудования в БД
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {   
       $validated = $request->validate([
        'name' => 'required|max:255|string',
        'npp' => 'nullable|numeric'
    ]);
        
    $query= $this->repository->sodevicepost($request);
 
    return back()->with('component-ok', 'Обладнання додано...');
}

    /**
     * Обновление справочника уник оборудования 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

       $query = $this->repository->sodeviceupdate($request, $id);
       
       //Если запись вставлена в БД
        if ($query == 1){
         return back()->with('component-ok', 'Довідник відкориговано...');
       }
       //Если запись невставлена в БД
       if ($query == 2){
        return back()->with('component-ok', 'Довідник невідкориговано...');
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
        $this->repository->sodevicedestroy($request, $id);

        return back()->with('component-ok', 'Довідник видалено...');
    }
}
