@extends('medical')

@section('content')

<style>
.head{
    font-size: 12px;
}
 .otstup {
  margin-right: 0  !important;
  margin-left: 0  ;
  padding-right: 0  !important;
  padding-left: 1 ;
  padding-bottom: 0  !important;
  padding-top: 0  !important;
  margin-bottom: 0  !important;
  margin-top: 0  !important;
}
.group {
  margin-left: 20px  !important;

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

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Критерії ризиків</a>
  </li>
  <li class="nav-item">
    @php $id=3; @endphp
    <a class="nav-link" href="{{route('sprrizki.edit', $id)}}">Тромбопрофілактика (л/з)</a>
  </li>
  <li class="nav-item">
    @php $id=5; @endphp
    <a class="nav-link" href="{{route('sprrizki.edit', $id)}}">Антібіотікоровілактика (л/з)</a>
  </li>
  <li class="nav-item">
      @php $id=6; @endphp
    <a class="nav-link" href="{{route('sprrizki.edit', $id)}}">Інші (л/з)</a>
  </li>
</ul>

<!-- Button trigger modal  Кнопка скрыта добовляем в живую таблицу-->
<!-- <button type="button" class="btn rounded-pill ex-button-0" data-bs-toggle="modal" data-bs-target="#exampleModal" > <i class="bi bi-plus"></i> Додати запис</button> -->
 
<!-- Блок с выводом ошибок -->
@if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)

        @if ($errors->has('name')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано назву ризиків</li>
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
 <h4 class="mt-1">Критерії ризиків</h4>
  <form class="row g-3" method="post" action="{{ route('sprrizki.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Додати  ризики</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       @include('back.spr.sorizk.brick-rezk')
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
        <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
     </div>
    </div>
  </div>
</div>
</form>

<table class="table table-bordered mt-2"  style="width: 90%">
  <thead>
    <tr>
      <th class="head otstup" style="width: 5%">#</th>
      <th class="head otstup"  style="width: 57%" >Назва</th>
      <th class="head otstup"  style="width: 8%" >Бал тромборизику</th>
      <th class="head otstup" style="width: 8%">Дії</th>
    </tr>
  </thead>
  <tbody>
      @foreach($rizki as $item)
    <tr>
      <th class=" otstup">{{$loop->iteration}}</th>
      <td class=" otstup " @if($item->ntitle==1) style="color:{{$item->color}};font-weight: bold;"  @endif>{!!$item->nametromb2!!}  </td>
      <td class=" otstup" >@if($item->ntitle !=1 && $item->nball !=0) {{$item->nball}} @endif</td>
      <td class="korect otstup"> 
      <div class="btn-group dropend otstup"> @if($item->ntitle !=1)  <i data-bs-toggle="dropdown" aria-expanded="false">...</i> @endif
      <ul class="dropdown-menu otstup">
        <li  class="otstup "><a class="dropdown-item otstup" href="#" type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal1{{$item->id}}"><i class="bi bi-pencil"></i> Коригувати</a></li>
        <li  class="otstup "><form action="{{ route('sprrizki.destroy', $item->id) }}" method="post" class="dropdown-item otstup">
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
        <h5 class="modal-title" id="exampleModalLabel">Коригувати  ризики</h5>
      </div>
       <div class="modal-body" >
         <form action="{{route('sprrizki.update', $item->id)}}" method="POST">
                  {{ csrf_field() }}
                {{ method_field('PUT') }}   
                @include('back.spr.sorizk.brick-rezk')
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