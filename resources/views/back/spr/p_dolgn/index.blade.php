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

<div class="card card-body mt-2">
 <h4 class="mt-1">Довідник посад</h3>
  <!-- Блок с выводом ошибок -->
  @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        @if ($errors->has('dolgname')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказана назва посади </li>
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

<form class="row g-3" method="post" action="{{ route('p_dolgn.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати посаду</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="row">
       @include('back.spr.p_dolgn.brick-dolgn')
         
       </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
      <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
    </div>
  </div>
</div>
</form>

<table class="table table-bordered mt-3" style="width:50%">
  <thead>
    <tr>
      <th class="head otstup ">#</th>
      <th class="head otstup ">Назва посади</th>
      <th class="head otstup ">Дії</th>
    </tr>
  </thead>
  <tbody>
      @foreach($pdolgn as $item)
    <tr>
      <th class="otstup ">{{$loop->iteration}}</th>
      <td class="otstup ">{{$item->dolgname}}</td>
      <td class="otstup korect"><div class="btn-group dropend otstup">   <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
        <ul class="dropdown-menu otstup">
    <li class="otstup "><a class="dropdown-item otstup" href="#" type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal1{{$item->id}}"> Коригувати</a></li>
    <li class="otstup "><form action="{{ route('p_dolgn.destroy', $item->id) }}" method="post" class="">
                      @method('DELETE')
                            @csrf
              <input type="submit" class="btn btn-sm  pl-5" value=" Видалити"/> </form>  </li>
         </ul>
      </div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Коригувати посаду</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <div class="modal-body" >
         <form action="{{route('p_dolgn.update', $item->id)}}" method="POST">
                  {{ csrf_field() }}
                {{ method_field('PUT') }}   
           <div class="row">
            @include('back.spr.p_dolgn.brick-dolgn')
         
      </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
      <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
      </form>
    </div>
  </div></td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection