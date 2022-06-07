
<div class="col-12">
    <label  for="inputEmail4" class="form-label col-form-label-sm mt-1">Назва діагноза</label>
    <textarea type="text" class="form-control  form-control-sm " id="inputEmail4" name="name" style="height:150px;">@if(isset($item)) {{$item->name}} @elseif(old('name')){{old('name')}} @endif</textarea>
</div>
<div class="col-4" >
   <label class="form-label col-form-label-sm">Напрямок</label>
     <select name="p_payout_id" class="form-control form-control-sm is-invalid" required>
       <option value="0"> ... </option>
         @foreach($napr as $items)
        <option value="{{$items->id}}"  @if(isset($_GET) && (isset($_GET['p_payout'])) && $_GET['p_payout']==$items->id) selected  @elseif(isset($item) && $item->p_payout_id==$items->id) 
         selected @endif >{{$items->name}}</option>
        @endforeach
    </select>
</div>

 