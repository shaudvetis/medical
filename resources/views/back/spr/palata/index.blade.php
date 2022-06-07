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
<button type="button" class="btn rounded-pill ex-button-0" data-bs-toggle="modal" data-bs-target="#exampleModal" > <i class="bi bi-plus"></i> Додати запис</button>
 
<!-- Блок с выводом ошибок -->
@if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)

        @if ($errors->has('name')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано назва палати</li>
        @endif
        @if ($errors->has('countp')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано кількість палат </li>
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
 <h4 class="mt-1">Довідник палат</h4>

<!-- Button trigger modal -->

<form class="row g-3" method="post" action="{{ route('palat.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати назву палати</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       @include('back.spr.palata.brick-palat')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary btn-sm">Зберегти</button>
      </div>
    </div>
  </div>
</div>
</form>


<table class="table table-bordered mt-3" style="width:50%">
  <thead class="table-light">
    <tr>
      <th class="head" style="width: 5%">#</th>
      <th class="head" style="width: 5%">№ палати</th>
      <th class="head" style="width: 5%">Кількість ліжок</th>
      <th class="head" style="width: 5%">Реанімація</th>
      <th class="head" style="width: 5%">Дії</th>
    </tr>
  </thead>
  <tbody>
      @foreach($palat as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td style="width:20%">{{$item->name}}</td>
      <td >{{$item->countp}}</td>
      <td>@if(isset($item) && $item->rean==1)<i class="bi bi-check"></i>@endif</td>
      <td class="korect">
      <div class="btn-group dropend otstup">   <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
      <ul class="dropdown-menu otstup">
        <li  class="otstup "><a class="dropdown-item otstup" href="#" type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal1{{$item->id}}"><i class="bi bi-pencil"></i> Коригувати</a></li>
        <li  class="otstup "><form action="{{ route('palat.destroy', $item->id) }}" method="post" class="dropdown-item otstup">
                      @method('DELETE')
                          @csrf
        <i class="bi bi-trash"></i>  <input type="submit" class="btn btn-sm  pl-5" value=" Видалити"/> </form>
      </li>
    </ul>
   </div> </td>
 <!-- Modal -->
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Коригувати данні палати</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body" >
         <form action="{{route('palat.update', $item->id)}}" method="POST">
                  {{ csrf_field() }}
                {{ method_field('PUT') }}   
            @include('back.spr.palata.brick-palat')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
      </form>
    </div>
  </div>
 </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection