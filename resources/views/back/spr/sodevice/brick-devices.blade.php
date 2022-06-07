<div class="col-8">
  <label  class="form-label col-form-label-sm">Назва обладнання</label>
    <textarea type="text" class="form-control form-control-sm" name="name"  >@if(isset($item)) {{$item->name}} @endif
</textarea>
</div>
<div class="col-3">
  <label  class="form-label col-form-label-sm">№ npp</label>
    <input type="numeric" class="form-control form-control-sm" name="npp" value="@if(isset($item)) {{$item->npp}} @endif" >
</div>

 