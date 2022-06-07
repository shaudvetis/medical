<div class="col-8">
  <label class="form-label col-form-label-sm">Назва посади</label>
  <input type="text" class="form-control form-control-sm"  name="dolgname"   @if(isset($item)) value="{{$item->dolgname}}" @endif>
</div>