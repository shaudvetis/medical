@extends('medical')

@section('content')

<style>
    .head{
    font-size: 12px;
}
 td,th {
  margin-right: 0  !important;
  margin-left: 0  !important;
  padding-right: 0  !important;
  padding-left: 1  !important;
  padding-bottom: 0  !important;
  padding-top: 0  !important;
  margin-bottom: 0  !important;
  margin-top: 0  !important;
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

</style>


@include('back.filter.brick.groupsearchnib')
  
    @if(isset($user))
<div class="card card-body pt-2">
   <table class="table table-bordered" style="width:70%;">
    <tr>
     <td style="width:5%">Дії</td>
     <td style="width:30%">ПІБ</td>
     <td style="width:5%">Дата народження</td>
     <td style="width:5%">Телефон</td>
     </tr>
   <tbody id="pannel" class="back-pannel">
        <tr>
           <td class="korect otstup"> <div class="btn-group btn-sm">
            <i data-bs-toggle="dropdown" aria-expanded="false">...</i> 
            <ul class="dropdown-menu otstup">
             <li><a class="dropdown-item otstup" href="{{route('addsurgery', $user->nib)}}" id="{{$user->id}}"><i class="bi bi-check2-circle"></i> Подивитись направлення</a> </li>
            <!--  <li><a class="dropdown-item otstup" href="#" type="button" data-toggle="modal" data-target="#exampleModal1{{$user->id}}"><i class="bi bi-card-list"></i> Графік прийомів</a></li>
             <li><a class="dropdown-item otstup" href="#" id="{{$user->id}}"><i class="bi bi-trash"></i> Видалити</a></li> -->
             </ul>
             </div>
            </td>

            <td>{{$user->pac_fio}}</td>
            <td>{{$user->pac_born}}</td>
            <td>{{$user->w_tlph}}</td>
        </tr>

    </table>
</div>
@endif
@endsection