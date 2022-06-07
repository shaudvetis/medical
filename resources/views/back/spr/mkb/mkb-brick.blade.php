<style>
  ul li { 
   list-style: none; 
   cursor: pointer;
 }

  ul.child {
      display: none;
      opacity: 0; 
  }
  ul.child.active {
      display: block;
      opacity: 1;
  }

</style>

<div class="row">
<div class="card card-body col-6" style=" height: 70vh;overflow-y: scroll;"> 
@if (count($mkb_group) > 0)
 <div id="categorieslist" >
  @include('back.spr.mkb.list',['mkb_group' => $mkb_group])
 </div>
@else
  {{ __('No found') }}
@endif
</div>

<div class="card card-body col-6 namediagnos" style=" height: 70vh;overflow-y: scroll;">
    @include('back.spr.mkb.mkbdiagnoses')
</div>

</div>
<!-- //нижняя часть работы с поиском по МКБ  -->
  @php $en = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
  'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');  @endphp
 <div class="row col-12  ml-2" style="background-color:#FFFAFA">
  <div class="col-1">
    <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px">Код МКБ</label>
    <select class="form-control form-control-sm mkb1">
        <option></option>
        @foreach ($en as $ens)
        <option>{{$ens}}</option>
        @endforeach
    </select>
   </div>
  <div class="col-1">
    <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px">Шифр</label>
    <input type="text" class="form-control form-control-sm mkb2">
    </div>
    <div class="col-1">
    <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px">Шифр</label>
    <input type="text" class="form-control form-control-sm mkb3"> 
    <button class="btn btn-sm mt-1 searchmkb" style="color:#8370DB;">Пошук</button>
    </div>
<div class="col-5">
 <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px">Назва діагнозу</label>
 <input type="text" class="form-control form-control-sm mkb4" >
 <button  class="btn btn-sm mt-1 mkbdell" style="color:pink;">Видалити діагноз</button>
</div>
<div class="col-4">
 <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px">Пошук діагнозу</label>
 <input type="text" class="form-control form-control-sm mkbdiag" >
 <button class="btn btn-sm mt-1 btnmkbdiag" style="color:blue;">Пошук діагноза</button>
</div>  
</div>

