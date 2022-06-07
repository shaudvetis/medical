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
<button type="button" class="btn rounded-pill ex-button-0 " data-bs-toggle="modal" data-bs-target="#exampleModal" > <i class="bi bi-plus"></i> Додати запис</button>

<div class="card card-body pt-0 mt-2">
  <h3 class="mt-1">Довідник напрямків</h3>
  <!-- Блок с выводом ошибок -->
   @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        @if ($errors->has('name')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказана назва напрямку </li>
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

<form class="row g-3" method="post" action="{{ route('p_payout.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
  <!-- Modal для создания нового направления -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати напрямок</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
      <div class="modal-body">
          @include('back.spr.payout.brick-payout')
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
     </div> 
    </div>
  </div>
</form>

<!-- Вывод существующего направдения -->
<table  class="table table-sm table-bordered mt-3" style="width:50%">
  <thead>
    <tr>
      <th class="head otstup " >#</th>
      <th class="head otstup ">Назва</th>
      <th class="head otstup ">Колір</th>
      <th class="head otstup ">Дії</th>
    </tr>
  </thead>
  <tbody>
      @foreach($p_payout as $item)
    <tr>
      <th class="otstup ">{{$loop->iteration}}</th>
      <td class="otstup ">{{$item->name}}</td>
      <td class="otstup " style="background-color:{{$item->color}}"> </td>
      <td class="korect otstup"><div class="btn-group dropend otstup">   <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
        <ul class="dropdown-menu otstup">
         <li class="otstup "><a class="dropdown-item otstup" href="#" type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal1{{$item->id}}"> Коригувати</a></li>
         <li class="otstup "> <form action="{{ route('p_payout.destroy', $item->id) }}" method="post" class="">
                      @method('DELETE')
                            @csrf
              <input type="submit" class="btn btn-sm  pl-5" value=" Видалити"/> </form>  </li>
         </ul>
      </div>
 <!-- Modal в td Корректировка напраления-->
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Коригувати напрямок</h5>
      </div>
      <div class="modal-body" >
        <form action="{{route('p_payout.update', $item->id)}}" method="POST">
                  {{ csrf_field() }}
                {{ method_field('PUT') }}   
               @include('back.spr.payout.brick-payout')
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
  </tbody>
</table>
</div>


@endsection