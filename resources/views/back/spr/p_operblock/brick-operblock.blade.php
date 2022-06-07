         <div class="col-6">
           <label for="inputEmail4" class="form-label col-form-label-sm">Назва </label>
           <input type="text" class="form-control form-control-sm" id="inputEmail4" name="opername"  @if(isset($item)) value="{{$item->opername}}" @endif>
         </div>
         <div class="col-6">
           <label for="inputEmail4" class="form-label col-form-label-sm">Цифрова назва </label>
           <input type="number" class="form-control form-control-sm" id="inputEmail4" name="npp"  @if(isset($item)) value="{{$item->npp}}" @endif>
         </div>
        <div class="col-4">
          <label  class="form-label col-form-label-sm">Початок роботи</label>
           <input type="number" min="0"  step="00.01" class="form-control raz form-control-sm" name="startwork"  @if(isset($item)) value="{{$item->startwork}}" @endif>
         </div>
        <div class="col-4">
          <label class="form-label col-form-label-sm">Кінець роботи</label>
           <input type="number" min="0"  step="00.01" class="form-control raz form-control-sm"  name="endwork"   @if(isset($item)) value="{{$item->endwork}}" @endif>
         </div>



 