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

<!-- Роут справочника направлоений
Route::resource('/p_payout', 'PayoutController'); -->

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
         <option value="{{$item1->id}}" @if(isset($_GET) && (isset($_GET['p_payout'])) && $_GET['p_payout']==$item1->id)  selected  @endif>  {{$item1->name}}</option>
        @endforeach
        <option value="all">Усі рядки</option>
      </select>
     <button class="btn btn-outline-info btn-sm" type="submit">Пошук</button>
     </form>
  </div> 
  <a href="{{route('sodiag.index')}}" class="pl-5" style="background-color: #e3f2fd;"><strong>Очистити фільтр</strong></a> 
   </nav>
</div>

<div class="card card-body pt-0 mt-2">
  <h3 class="mt-1">Довідник  діагнозів</h3>
  <!-- Блок с выводом ошибок -->
   @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        @if ($errors->has('name')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказана назва діагнозу </li>
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

<form class="row g-3 needs-validation" novalidate method="post" action="{{ route('sodiag.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
  <!-- Modal для создания нового направления -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати  діагноз</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
      <div class="modal-body">
          @include('back.spr.sodiag.brick-sodiag')
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
     </div> 
    </div>
  </div>
</form>

 <div class="form-inline mt-2 col-7">
    <input class="form-control mr-sm-2 nam" type="search" name="id" placeholder="Пошук по словосполученню" aria-label="Пошук">
    <!--<button class="btn btn-outline-success my-2 my-sm-0 nams" >Пошук</button>-->
 </div>

<!-- Вывод существующего направдения --> 
<table  class="table table-sm table-bordered mt-3" style="width:90%" id="myTable">
  <thead>
    <tr>
      <th class="head otstup " >#</th>
      <th class="head otstup ">Діагноз</th>
      <th class="head otstup ">Напрямок</th>
      <th class="head otstup ">Дії</th>
    </tr>
  </thead>
  <tbody>
      @if(isset($diagnoses))
      @foreach($diagnoses as $item)
    <tr>
      <th class="otstup ">{{$loop->iteration}}</th>
      <td class="otstup ">{{$item->name}}</td>
      <td class="otstup "> {{$item->payoutname}}</td>
      <td class="korect otstup"><div class="btn-group dropend otstup">   <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
        <ul class="dropdown-menu otstup">
         <li class="otstup "><a class="dropdown-item otstup" href="#" type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal1{{$item->id}}"> Коригувати</a></li>
         <li class="otstup "> <form action="{{ route('sodiag.destroy', $item->id) }}" method="post" class="">
                      @method('DELETE')
                            @csrf
              <input type="submit" class="btn btn-sm  pl-5" value=" Видалити"/> </form>  </li>
         </ul>
      </div>
 <!-- Modal в td Корректировка напраления-->
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Коригувати  діагноз</h5>
      </div>
      <div class="modal-body" >
        <form action="{{route('sodiag.update', $item->id)}}" method="POST">
                  {{ csrf_field() }}
                {{ method_field('PUT') }}   
                @include('back.spr.sodiag.brick-sodiag')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
      </form>
    </div>
  </div>
</td>
</tr>
@endforeach
@endif
  </tbody>
</table>
</div>


@endsection


@section('js')
<script>
 $(".nam").on("keyup", function() {
    var  value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  </script>
@endsection