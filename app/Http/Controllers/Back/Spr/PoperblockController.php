<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SprRepository;

class PoperblockController extends Controller
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
     * Вивод справочника оперблока
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('start');
        }
        
        $block=$this->repository->blockoperget($request);

        return view ('back.spr.p_operblock.index', compact('block'));
    }

    /**
     * Запись справочника оперблока
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
    //   dump($request);
    //   exit();
    $validated = $request->validate([
        'opername' => 'max:255|required|bail',
        'startwork' => 'nullable',
        'endwork' => 'nullable',
        'npp' => 'nullable|numeric'
    ]);

   $this->repository->blockoperpost($request);
    
    return back()->with('component-ok', 'Оперблок додано...');
   }

    /**
     * Обновление справочника оперблока
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->repository->blockoperupdate($request, $id);
      
      return back()->with('component-ok', 'Оперблок відредаговано...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->blockoperdestroy($request, $id);
      
        return back()->with('component-ok', 'Оперблок видалено...');
        
    }
}
