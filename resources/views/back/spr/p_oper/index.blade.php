@extends('medical')

@section('content')

<style>
.head{
    font-size: 12px;
}
 .otstup {
  margin-right: 0  !important;
  margin-left: 0  !important;
  padding-right: 0  !important;
  padding-left: 1  !important;
  padding-bottom: 0  !important;
  padding-top: 0  !important;
  margin-bottom: 0  !important;
  margin-top: 0  !important;
}
label{
  line-height: .1 !important;
}
.korect{
    cursor: pointer;
}

table{
  font-size: 14px;
}
</style>

<!-- Button trigger modal -->
<div class="row">
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  @if(isset($_GET) && (isset($_GET['p_payout'])) && $_GET['p_payout'] !='all')
    <div class="col-4">
      <button type="button" class="btn rounded-pill ex-button-0" data-bs-toggle="modal" data-bs-target="#exampleModal" > <i class="bi bi-plus"></i> Додати запис</button>
  </div>
  @endif
  <div class="col-4">
    <form class="input-group">
      <select class="form-select form-select-sm" name="p_payout"> 
        <option value="0">Оберіть фільтр</option>
        @foreach ($napr as $item1)
         <option value="{{$item1->id}}" @if(isset($_GET) && (isset($_GET['p_payout'])) && $_GET['p_payout']==$item1->id) selected @endif>  {{$item1->name}}</option>
        @endforeach
        <option value="all">Усі рядки</option>
      </select>
     <button class="btn btn-outline-info btn-sm" type="submit">Пошук</button>
     </form>
  </div> 
  <a href="{{route('p_oper.index')}}" class="pl-5" style="background-color: #e3f2fd;"><strong>Очистити фільтр</strong></a> 
   </nav>
</div>

<!-- Блок с выводом ошибок -->
@if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)

        @if ($errors->has('u2name')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано назва операції</li>
        @endif
        @if ($errors->has('p_payout')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не обрано напрямок </li>
        @endif
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
  @endif
<!-- Сообщения об удачной записи или коректировке -->
@if (session('component-ok'))
 @include('layouts.brick-component')
@endif

<div class="card card-body mt-3">
 <h4 class="mt-1">Довідник операцій</h4>
  <form class="row g-3" method="post" action="{{ route('p_oper.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати операцію</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       @include('back.spr.p_oper.brick-p_oper')
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
     </div>
    </div>
  </div>
</div>
</form>

<table class="table table-bordered mt-2" style="width: 100%">
  <thead>
    <tr>
      <th class="head otstup">#</th>
      <th class="head otstup">Назва операції</th>
      <th class="head otstup" style="width: 5%" >Ціна</th>
      <th class="head otstup" style="width: 5%">Тривалість <br>госпіталізації</th>
      <th class="head otstup" style="width: 5%">Тривалість операції</th>
      <th class="head otstup" style="width: 8%">Напрямок</th>
      <th class="head otstup">Дії</th>
    </tr>
  </thead>
  <tbody>
      @foreach($oper as $item)
    <tr>
      <th class=" otstup">{{$loop->iteration}}</th>
      <td class=" otstup">{{$item->u2name}}</td>
      <td class=" otstup">{{$item->su_price}}</td>
      <td class=" otstup">{{$item->timegos}}</td>
      <td class=" otstup">{{$item->timeoper}}</td>
      <td class=" otstup">{{$item->name}}</td>
      <td class="korect otstup">
      <div class="btn-group dropend otstup">   <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
      <ul class="dropdown-menu otstup">
        <li  class="otstup "><a class="dropdown-item otstup" href="#" type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal1{{$item->id}}"><i class="bi bi-pencil"></i> Коригувати</a></li>
        <li  class="otstup "><form action="{{ route('p_oper.destroy', $item->id) }}" method="post" class="dropdown-item otstup">
                      @method('DELETE')
                          @csrf
        <i class="bi bi-trash"></i>  <input type="submit" class="btn btn-sm  pl-5" value=" Видалити"/> </form>
      </li>
    </ul>
   </div> </td>
  
 <!-- Modal -->
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Коригувати довідник операцій</h5>
      </div>
       <div class="modal-body" >
         <form action="{{route('p_oper.update', $item->id)}}" method="POST">
                  {{ csrf_field() }}
                {{ method_field('PUT') }}   
            @include('back.spr.p_oper.brick-p_oper')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
    </div>
  </div>
</div>
</form>
</tr>
@endforeach
  </tbody>
</table>
</div>

@endsection

@section('js') 
<script>
function up(e) {
  if (e.value.indexOf(".") != '-1') {
    e.value=e.value.substring(0, e.value.indexOf(".") + 2);
  }
}
function up2(e) {
  if (e.value.indexOf(".") != '-1') {
    e.value=e.value.substring(0, e.value.indexOf(".") + 3);
  }
}
</script>
@endsection