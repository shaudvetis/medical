<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SprRepository;
use Carbon\Carbon;
use App\Models\Spr\P_bag;


class PalatController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if (!Auth::check()) {
        return redirect()->route('start');
    }
    
      $palat= $this->repository->palatget($request);

      return view ('back.spr.palata.index', compact('palat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

    $validated = $request->validate([
   
      'name' => 'required|max:255|bail|string',
      'countp' => 'required|numeric',
      'rean' => 'numeric|nullable',
 ]);

     $this->repository->palatpost($request);
  
    return back()->with('component-ok', 'Палату додано...');

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    
      $query=$this->repository->palatupdate($request, $id);
     
   
      return back()->with('component-ok', 'Палату відкориговано...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $this->repository->palatdestroy($request, $id);

      return back()->with('component-ok', 'Палату та койку  видалено ...');
        
    }
}
