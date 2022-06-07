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
<button type="button" class="btn rounded-pill ex-button-0 " data-bs-toggle="modal" data-bs-target="#exampleModal" > <i class="bi bi-plus"></i> Додати запис</button>

<!-- Блок с выводом ошибок -->
@if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        @if ($errors->has('password')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказан пароль </li>
        @endif
        @if ($errors->has('surname')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано Призвище</li>
        @endif
        @if ($errors->has('name')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано Ім'я </li>
        @endif
        @if ($errors->has('lastname')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано По-батькові </li>
        @endif
        @if ($errors->has('p_dolgn_id')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказана посад </li>
        @endif
        @if ($errors->has('p_payout_id')) 
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказан напрямок </li>
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
 <h3 class="mt-1">Довідник працівників</h3>
  <!-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;"> -->

 <div class="form-inline ">
    <input class="form-control mr-sm-2 nam" type="search" name="id" placeholder="Пошук по ПІБ" aria-label="Пошук">
    <!--<button class="btn btn-outline-success my-2 my-sm-0 nams" >Пошук</button>-->
 </div>

<!-- <form class="form-inline">-->
<!--    <input class="form-control mr-sm-2" type="search" name="namedoc" placeholder="Пошук пошук за посадою" aria-label="Пошук">-->
<!--    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Пошук</button>-->
<!--<a href="{{route('profile.index')}}" style="background-color: #e3f2fd;"><strong>Назад</strong></a>  -->
<!-- </nav> -->

  <div class="card card-body mt-3">
   <form class="row g-3" method="post" action="{{ route('profile.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Додати працівника</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
           <div class="modal-body">
            <div class="row">
             @include('back.spr.profile.brick-profile')
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

<table class="table table-bordered mt-4" id="myTable">
	<tr id="id">
	  <th>#</th>
		<th class="head otstup">ПІБ</th>
		<th class="head otstup">Посада</th>
		<th class="head otstup">Напрямок</th>
		<th class="head otstup">Хірург</th>
		<th class="head otstup">День народження</th>
		<th class="head otstup">Телефон</th>
		<th class="head otstup">Email</th>
		<th class="head otstup">Дії</th>
    <!--<th title="Налаштування доступу">Н</th>-->
	</tr>
  @foreach ($user as $users)
  <tr>
    <td>{{$loop->iteration}}</td>
    <td class="fullname">{{$users->fullname}}</td>
    <td>{{$users->dolgname}}</td>
    <td>{{$users->namenapr}}</td>
    <td>@if($users->isxcode==1) <i class="bi bi-check"></i> @endif</td>
    <td>{{$users->date_bird}}</td>
    <td>{{$users->phone}}</td>
    <td>{{$users->email}}</td>
    <td class="korect">
      <div class="btn-group dropend otstup">   <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
      <ul class="dropdown-menu otstup">
        <li  class="otstup "><a class="dropdown-item otstup" href="#" type="button" data-bs-toggle="modal"  data-bs-target="#exampleModal1{{$users->id}}"><i class="bi bi-pencil"></i> Коригувати</a></li>
        <li  class="otstup "><form action="{{ route('profile.destroy', $users->id) }}" method="post" class="dropdown-item otstup">
                      @method('DELETE')
                          @csrf
        <i class="bi bi-trash"></i>  <input type="submit" class="btn btn-sm  pl-5" value=" Видалити"/> </form>
      </li>
    </ul>
   </div> 

  <!-- Modal -->
<div class="modal fade" id="exampleModal1{{$users->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Коригувати працівника</h5>
       </div>
       <div class="modal-body" >
        <div class="row">
         <form action="{{route('profile.update', $users->id)}}" method="POST">
                  {{ csrf_field() }}
                {{ method_field('PUT') }}   
           @include('back.spr.profile.brick-profile')
        </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Закрити</button>
       <button type="submit" class="btn btn-primary  btn-sm">Зберегти</button>
      </div>
     </form>
    </div>
  </div> 
</div>
 </td>
</tr>
@endforeach
</tbody>
</table>

</div>

@endsection

@section('js')
<script>
 //Формируем сокрщенное название
 $(document).ready(function(){
  $('body').on('change', "input[name='lastname']", function(){

 var v = $("input[name='surname']").val();
 var f = $("input[name='name']").val().substr(0,1);
 var d = $("input[name='lastname']").val().substr(0,1);
 var s = v+' '+f+'.'+d;
  $("input.shortname").val(s);
    });
//Поиск по ФИО
  $(".nam").on("keyup", function() {
    var  value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>
@endsection
