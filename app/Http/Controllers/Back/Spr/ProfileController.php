<?php
namespace App\Http\Controllers\Back\Spr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SprRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
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
     * Вывод справочника сотрудников. С Композера подтягиваются должности  и направления
     *
     * @return void
     */

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('start');
        }
        
        $user=$this->repository->userget($request);

        return view ('back.spr.profile.index', compact('user'));
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
            'email' => 'max:255|email|nullable',
            'password' => 'required|max:255|bail|string',
            'surname' => 'required|max:255|bail|string',
            'name' => 'required|max:255|bail|string',
            'lastname' => 'required|max:255|string',
            'fullname' => 'required|max:255|string',
            'p_dolgn_id' => 'required|numeric',
            'p_payout_id' => 'required|numeric',
            'isxcode' => 'numeric|nullable',
            'date_bird' => 'date|nullable',
            'phone' => 'max:12|numeric|nullable',
       ]);

       $this->repository->userstore($request);
        
    return back()->with('component-ok', 'Користувача додано...');
    
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
        $this->repository->userupdate($request, $id);
        
        return back()->with('component-ok', 'Користувача відредаговано...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->userdestroy($request, $id);
        
        return back()->with('component-ok', 'Користувача видалено...');
    }
}
