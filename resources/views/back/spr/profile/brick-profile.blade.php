<!-- $dolg и napr с Компосера -->

<div class="row needs-validation">
 <div class="col-4">
   <label for="surname" class="form-label col-form-label-sm">Призвище </label>
    <input type="text" class="form-control form-control-sm is-invalid" id="surname" name="surname" @if(isset($users)) value="{{$users->surname}}" @endif required>
  </div>

 <div class="col-3">
   <label for="name" class="form-label col-form-label-sm">Ім'я</label>
   <input type="text" class="form-control form-control-sm is-invalid" id="name" name="name" required  @if(isset($users)) value="{{$users->name}}" @endif>
 </div>

 <div class="col-3">
  <label for="lastname" class="form-label col-form-label-sm">По-батькові</label>
  <input type="text" class="form-control form-control-sm is-invalid" id="lastname" required name="lastname" @if(isset($users)) value="{{$users->lastname}}" @endif>
</div>

<div class="col-2" >
  <label  class="form-label col-form-label-sm">Скороченно</label>
  <input type="text" name="fullname" class="form-control shortname form-control-sm" @if(isset($users)) value="{{$users->fullname}}" @endif >
</div>
</div>

<div class="row">
  <div class="col-4" >
    <label class="form-label col-form-label-sm">Посада</label>
    <select name="p_dolgn_id" class="form-control form-control-sm is-invalid" required>
      <option value="0"> ... </option>
         @foreach($dolg as $items)
      <option value="{{$items->id}}" @if(isset($users) && $users->p_dolgn_id==$items->id) selected @endif >{{$items->dolgname}}</option>
        @endforeach
    </select>
    <div class="invalid-feedback texthead_ukr" >
       Обов'язково введіть посаду.
    </div>
  </div>
    <div class="col-4" >
      <label class="form-label col-form-label-sm">Напрямок</label>
      <select name="p_payout_id" class="form-control form-control-sm is-invalid" required>
        <option value="0"> ... </option>
         @foreach($napr as $items)
        <option value="{{$items->id}}" @if(isset($users) && $users->p_payout_id==$items->id) selected @endif >{{$items->name}}</option>
        @endforeach
      </select>
      <div class="invalid-feedback texthead_ukr" >
       Обов'язково введіть посаду.
      </div>
    </div>
   <div class="col-2">
    <div class="form-check mt-4">
      <input class="form-check-input form-control-sm" type="checkbox" id="gridCheck" @if(isset($users) && $users->isxcode==1 ) checked @endif value="1" name="isxcode">
      <label class="form-check-label col-form-label-sm" for="gridCheck">
        Хірург
      </label>
    </div>
  </div>
</div>
    
<div class="row">
  <div class="col-2">
    <label class="form-label col-form-label-sm">День нарождення</label>
    <input type="date" name="date_bird" class="form-control form-control-sm" @if(isset($users)) value="{{$users->date_bird}}" @endif>
  </div>
  <div class="col-3">
    <label for="validationCustom03" class="form-label col-form-label-sm">Пароль</label>
    <input type="text" name="password" id="validationCustom03" class="form-control form-control-sm" @if(isset($users)) value="{{$users->textpassword}}" @endif>
    <div class="invalid-feedback texthead_ukr">
       Обов'язково введіть пароль.
    </div>
  </div>
    <div class="col-3" >
      <label class="form-label col-form-label-sm">Телефон</label>
      <input type="phone" name="phone" class="form-control form-control-sm" @if(isset($users)) value="{{$users->phone}}" @endif placeholder="Внести 665008878">
    </div>
    <div class="col-3" >
      <label class="form-label col-form-label-sm">Пошта</label>
      <input type="email" name="email" class="form-control form-control-sm" @if(isset($users)) value="{{$users->email}}" @endif>
     </div>
</div>
