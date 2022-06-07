<div class="col-8">
  <label for="inputEmail4" class="form-label col-form-label-sm">Назва препарату</label>
    <textarea type="text" class="form-control form-control-sm" id="inputEmail4" name="nametromb2">@if(isset($item)) {{$item->nametromb2}} @endif </textarea>
</div>
<input type="hidden" name="ngroup" value="{{$tr}}">

<div class="col-8">
  <label  class="form-label col-form-label-sm">Доза</label>
    <input type="text" class="form-control form-control-sm" name="cnumber" value="@if(isset($item)) {{$item->cnumber}} @endif" >
</div>



 