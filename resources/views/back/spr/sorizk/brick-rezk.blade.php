<div class="col-8">
  <label for="inputEmail4" class="form-label col-form-label-sm">Назва ризику</label>
    <textarea type="text" class="form-control form-control-sm" id="inputEmail4" name="nametromb2"  disabled >@if(isset($item)) {{$item->nametromb2}} @endif </textarea>
</div>

<input type="hidden" name="ngroup" value="1">
<input type="hidden" name="nametromb2" value="@if(isset($item)) {{$item->nametromb2}} @endif">

<div class="col-3">
  <label  class="form-label col-form-label-sm">Балл</label>
    <input type="numeric" class="form-control form-control-sm" name="nball" value="@if(isset($item)) {{$item->nball}} @endif" >
</div>


 