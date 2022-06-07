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

<!--Страница создания нового пользователя-->

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Створення нового направлення</h5>
          </div>
 
        </div>
      </div>

<!-- SEARCH FORM -->
    <form class="form-inline ml-3 mb-1" action="{{route('searchuser')}}" method="POST">
                    {{ csrf_field() }}
                {{ method_field('POST') }} 
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar " type="date" placeholder="Search" aria-label="data" name="pac_born">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
      
      <!-- Ссілка на создание нового физ лица пока закріто <a href="{{route('usersearchs')}}" class="ml-5 user"> NEW </a>-->
</form>



@if(isset($user))
<div class="card card-body" style="width:100%">
   <table class="table table-bordered ">
    <thead class="table-light">
    <tr>
     <td class="otstup head" style="width:2%">Дії</td>
     <th class="otstup head" style="width:30%">ПІБ</th>
     <th class="otstup head" style="width:5%">Дата народження</th>
     <th class="otstup head" style="width:5%">Телефон</th>
   </tr>
    </thead>
   <tbody id="pannel" class="back-pannel">
     @foreach($user as $item)
       <tr>
         <td class="korect otstup"> <div class="btn-group btn-sm pl-0 pr-0">
            <i data-bs-toggle="dropdown" aria-expanded="false" >.....</i> 
            <ul class="dropdown-menu otstup ">
             <li><a class="dropdown-item otstup " href="{{route('refsurgery', $item->PatientID)}}" id="{{$item->PatientID}}"><i class="bi bi-check2-circle"></i> Сформувати направлення</a> </li>
             <li><a class="dropdown-item otstup " href="{{route('userprofileedit', $item->PatientID)}}" id="{{$item->PatientID}}"><i class="bi bi-pencil"></i> Коригувати</a> </li>
             <li><a class="dropdown-item otstup" href="#" type="button" data-toggle="modal" data-target="#exampleModal1{{$item->PatientID}}"><i class="bi bi-card-list"></i> Графік прийомів</a></li>
             <li><a class="dropdown-item otstup" href="#" id="{{$item->PatientID}}"><i class="bi bi-trash"></i> Видалити</a></li>
             </ul>
             </div>
            </td>
            <td>{{$item->PatientName}} </td>
            <td>{{ Carbon\Carbon::parse($item->PatientBirthDate)->format('Y-m-d')}}</td>
            <td>{{$item->PatientPhone}}</td>  
        </tr> 
                  @endforeach
                         </tbody>    
</table>
</div>
@endif

@endsection

@section('js')
<script>

$(document).ready(function(){
$("input[name='pacsurname']").change( function(){
    // alert('kk');
 //BaseRecords.destroy($(this).attr('id'));
 var v = $("input[name='pacfam']").val();
 var f = $("input[name='pacname']").val();
 var d = $("input[name='pacsurname']").val();
var s = v+' '+f+' '+d;
  $("input.pac_fio").val(s);
//alert(s);
    });

});
</script>
@endsection