<div class="col-12">
  <label for="inputEmail4" class="form-label col-form-label-sm">Назва операції</label>
    <input type="text" class="form-control form-control-sm" id="inputEmail4" name="u2name" placeholder="Введіть назву"  @if(isset($item)) value="{{$item->u2name}}" @endif>
</div>
<div class="col-8">
  <label for="inputEmail4" class="form-label col-form-label-sm">Напрямок</label>
    <select class="form-select form-select-sm" name="p_payout">
      <option> Оберіть </option>
        @foreach ($napr as $item1)
         <option value="{{$item1->id}}" @if(isset($_GET) && (isset($_GET['p_payout'])) && $_GET['p_payout']==$item1->id) selected  @elseif(isset($item) && $item->p_payout==$item1->id) 
         selected @endif>  {{$item1->name}}</option>
        @endforeach
      </select>
</div>
         
 <form class="row g-3">
  <div class="col-3">
    <label for="inputEmail4" class="form-label col-form-label-sm">Ціна операції </label>
     <input type="number" name="su_price" class="form-control form-control-sm"  @if(isset($item)) value="{{$item->su_price}}" @endif>
   </div>

    <label for="inputEmail4" class="form-label col-form-label-sm">Тривалість госпіталізації</label>
    <div class="col-2">
    <input type="number" step="0.1" min="0" name="timegos" class="form-control form-control-sm" @if(isset($item)) value="{{$item->timegos}}" @endif   oninput="up(this)">
  </div>
  <label class="form-label col-form-label-sm ">Тривалість операції</label>
    <div class="col-2">
    <input type="number" name="timeoper" step="0.01" min="0"  oninput="up2(this)" class="form-control form-control-sm"   @if(isset($item)) value="{{$item->timeoper}}" @endif>
  </div>


 