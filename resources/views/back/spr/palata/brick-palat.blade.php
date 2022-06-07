         <div class="col-4">
          <label for="inputEmail4" class="form-label col-form-label-sm">Назва палати, номер</label>
           <input type="text" class="form-control form-control-sm" id="inputEmail4" name="name"  @if(isset($item)) value="{{$item->name}}" @endif>
           <input type="hidden" name="nameold" @if(isset($item)) value="{{$item->name}}" @endif>
          </div>
          <div class="col-4 mt-2">
          <label for="inputEmail4" class="form-label col-form-label-sm">Кількість ліжок</label>
          <input type="number" name="countp"  class="form-control form-control-sm" id="inputEmail4" @if(isset($item)) value="{{$item->countp}}" @endif>
          <input type="hidden" name="countpold" @if(isset($item)) value="{{$item->countp}}" @endif>
           
         </div>
          <div class="col-12 mt-3">
           <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="rean"  value="0" checked >
            <input class="form-check-input" type="checkbox" id="gridCheck" name="rean"  value="1" @if(isset($item) && $item->rean==1) checked @endif>
            
            <label class="form-check-label" for="gridCheck">
            Реанімація
           </label>
          </div>
        </div>
        


 