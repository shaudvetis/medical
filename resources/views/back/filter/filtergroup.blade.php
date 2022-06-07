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


@include('back.filter.brick.groupsearchnib')


<div class="form-inline">
    <input class="form-control mr-sm-2 nam ml-1 mb-1" type="search" name="id" placeholder="Пошук по ПІБ" aria-label="Пошук">
</div>

@if(isset($user))
<div class="card card-body">
   <table class="table table-bordered" style="width:90%" id="myTable">
    <tr>
     <td class="otstup head" style="width:5%">Дії</td>
     <td class="otstup head" style="width:30%">ПІБ</td>
     <td class="otstup head" style="width:5%">Дата народження</td>
     <td class="otstup head" style="width:8%">Лікар</td>
     <td class="otstup head" style="width:5%">Напрямок</td>
     
     <td class="otstup head" style="width:5%">Телефон</td>
     </tr>
   <tbody id="pannel" class="back-pannel">
     @foreach($user as $item)
       <tr>
           <td class="korect otstup"> <div class="btn-group btn-sm">
            <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
            <ul class="dropdown-menu otstup">

             <li><a class="dropdown-item otstup" href="{{route('addsurgery', $item->nib)}}" id="{{$item->id}}"><i class="bi bi-check2-circle"></i> Подивитись направлення</a> </li>
             <!-- <li><a class="dropdown-item otstup" href="{{route('userprofileedit', $item->nibcard)}}" id="{{$item->id}}"><i class="bi bi-pencil"></i> Коригувати</a> </li> -->
             <li><a class="dropdown-item otstup" href="#" type="button" data-toggle="modal" data-target="#exampleModal1{{$item->id}}"><i class="bi bi-card-list"></i> Графік прийомів</a></li>
             <li><a class="dropdown-item otstup" href="#" id="{{$item->id}}"><i class="bi bi-trash"></i> Видалити</a></li>
             </ul>
             </div>
            </td>

            <td>{{$item->pacfam}} {{$item->pacname}} {{$item->pacsurname}}</td>
            <td>{{Carbon\Carbon::parse($item->pac_born)->format('d-m-Y')}}</td>
             <td>{{$item->fullname}}</td>
             <td>{{$item->name}}</td>
            <td>{{$item->w_tlph}}</td>
        </tr>
    @endforeach
    </table>
</div>
 {{ $user->links() }}
@endif
@endsection

@section('js')

<script>

 $(document).ready(function(){
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

