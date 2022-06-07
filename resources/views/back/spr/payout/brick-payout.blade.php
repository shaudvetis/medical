<div class="col-2">
          <input type="hidden" class="form-control " id="inputAddress" disabled @if(isset($item)) value="{{$item->id}}" @endif>
         </div>
         <div class="col-8">
          <label  for="inputEmail4" class="form-label col-form-label-sm mt-1">Назва</label>
           <input type="text" class="form-control  form-control-sm " id="inputEmail4" name="name" placeholder="Введіть назву"  value="@if(isset($item)) {{$item->name}} @elseif(old('name')){{old('name')}} @endif">
         </div>
          <div class="col-3 mt-2">
         <label for="exampleColorInput" class="form-label col-form-label-sm">Color picker</label>
         <input type="color" class="form-control form-control-color form-control-sm" id="exampleColorInput" name="color"  title="Choose your color" value=" @if(isset($item)) {{$item->color}} @elseif(old('color')){{old('color')}} @endif">
</div>
 