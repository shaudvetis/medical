<?php

namespace App\Http\Controllers\Back\Spr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Repositories\SprRepository;
use App\Models\Spr\IcdGroup;
use App\Models\Spr\IcdDiagnoses;
use DB;

class SprmkbController extends Controller
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
        //$rizki=$this->repository->rizkget($request);
        
        
//        dump($one);
// exit();  

        $mkb_group = Cache::rememberForever('mkb_group', function() {
        return IcdGroup::where('parent_id', 0) 
         ->with('children')
         ->get();
        });

       $diagnoses = Cache::rememberForever('mkb_diagnoses', function() {
        return IcdDiagnoses::select('gr1','gr2','gr3','code','name_diagnoses')
         ->get();
        });
        
         //$query= $diagnoses->get();
       //$value = 'Холе';

       // $valueUp    = strtoupper($value);
       // $valueLower = strtolower($value);



//$query = $diagnoses->where('name_diagnoses', 'LIKE', '%' . ($valueUp || $valueLower) . '%' );
        //$diagnosname = collect($diagnoses)->where('gr3', 'A00');

//        dump($collection);
// exit();  

       // Ajax response
        if ($request->ajax()) {
          
          // $diagnoses = IcdDiagnoses::select('gr1','gr2','gr3','code','name_diagnoses');

          if (isset($request->ur) && ($request->ur == 'ur1')) 
          
          $query = collect($diagnoses)->where('gr1', $request->name)->sortBy('name_diagnoses');
          //$diagnoses->where('gr1', $request->name);
          
          if (isset($request->ur) && ($request->ur == 'ur2')) 
          $query = collect($diagnoses)->where('gr2', $request->name)->sortBy('name_diagnoses');

         if (isset($request->ur) && ($request->ur == 'ur3')) 
          $query = collect($diagnoses)->where('gr3', $request->name)->sortBy('name_diagnoses');
         
         if (isset($request->ur) && ($request->ur == 'mkbcode')) 
          $query = collect($diagnoses)->where('code', $request->name)->sortBy('name_diagnoses');

         if (isset($request->ur) && ($request->ur == 'mkbsearch')) {
            $name = $request->name;
           
            $query = $diagnoses->filter(function ($diagnoses) use ($name) {
             return mb_stripos($diagnoses['name_diagnoses'], $name) !== false;
          })->sortBy('name_diagnoses');
         }

           

         //$query= $diagnoses->get();

            return response()->json([
                'table' => view("back.spr.mkb.mkbdiagnoses", ['query' => $query])->render(),
            ]);
        } 


if (isset($request->ur2)) {
         $ws2 = DB::select("select icd_group.id,icd_group.name_diagnoses, icd_group.ur1, icd_group.gr2, icd_group.gr3,icd_group.gr1 from icd_group where gr2='$request->ur2' and gr3 !='' order by ur1, gr1,gr2, gr3 "); 
        //$diagnoses = DB::select("select namedia from icd_diagnoses where gr1='$request->gr1' "); 
         // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("back.spr.mkb.mkbur3", ['ws2' => $ws2])->render(),
            ]);
        } 
    }

 if (isset($request->gr1)) {
         $diagnoses = DB::select("select namedia, code from icd_diagnoses where gr1='$request->gr1' "); 
        
         // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("back.spr.mkb.mkbdiagnoses", ['diagnoses' => $diagnoses])->render(),
            ]);
        } 
    }

if (isset($request->ur3)) {
$ys = DB::select("select icd_group.id, icd_group.id,icd_diagnoses.namedia,icd_diagnoses.code, icd_diagnoses.gr3 from icd_diagnoses where gr3='$request->ur3' ");
   if ($request->ajax()) {
            return response()->json([
                'table' => view("back.spr.mkb.mkbur4", ['ys' => $ys])->render(),
            ]);
        } 
      }

if (isset($request->searchname)) {
$diagnoses = DB::select("select UPPER(icd_diagnoses.namedia) as namedia,icd_diagnoses.code, icd_diagnoses.id from icd_diagnoses where  namedia LIKE '%$request->searchname%' ");
   if ($request->ajax()) {
            return response()->json([
                'table' => view("back.spr.mkb.mkbdiagnoses", ['diagnoses' => $diagnoses])->render(),
            ]);
        } 
      }
       // return Response($mkb2);

     //$med= DB::select("select icd_group.name_diagnoses, gr1,gr2,gr3,ur1, id from  icd_group where gr1 in (select icd_group.gr1 from  icd_group ) order by ur1, gr1,gr2, gr3");

// dump($med);
// exit();  
        return view ('back.spr.mkb.index', compact (['mkb_group']));
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
