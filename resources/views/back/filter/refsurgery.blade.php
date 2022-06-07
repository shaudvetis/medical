@extends('medical')

@section('content')
<style>
    .table {
        width: 900px;
        background: #fbfbfb;
        border: 1px solid #ccc;
        margin: 30px auto;
    }

    .table-row {
        display: table-row;
    }

    .table-cell {
        display: table-cell;
        width: 300px;
        height: 300px;
        vertical-align: top;
        text-align: right;
    }

    .item {
        border-bottom: 1px solid #ccc;
    }

    .table-cell:first-child div {
        height: 50%;
    }

    .table-cell:nth-child(2) div {
        height: 25%;
    }

    .table-cell:nth-child(2) {
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
    }

    .table-cell:nth-child(3) {
        vertical-align: middle;
    }

    .table-cell div {
        padding: 12px;
    }

    @media (max-width:1024px) {
        .table {
            width: 800px;
            transform: scale(.8);
            margin: auto;
        }
    }

    @media (max-width:768px) {
        .table {
            transform: scale(.9);
            width: 500px;
            margin: auto;
        }
    }
    label{
    line-height: .1 !important;
}
.canvas {
    left:0;
    top:0;
    width:100%;
    height:100%;
    min-height:100%;
    min-width:100%;height:100%;
    top:0%;left:0%;
    resize:none;
}
.id_palattr{
    color: red;
}
.save{
color:black;
}
    table {
        width: 100%;
        border-spacing: 0;
        border: 1px solid lightsteelblue;
    }
    td { /* border: 1px solid #dee2e6;*/
        border: 1px solid #dee2e6;
        text-align:left;
        height: 27px !important;
    }

td.time{

}

</style>

<div class="card card-body mt-0">
 <h5>Заповнення направлення </h5>
<form class="row g-3 ml-1 mr-2 mt-2" method="post" action="{{ route('refsurgery', $item->nib) }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }}
<div class="row">
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label col-form-label-sm" style="font-size:10px">ПІБ</label>
    <input type="text" class="form-control form-control-sm" id="inputEmail4" value="{{$item->pacfam}} {{$item->pacname}} {{$item->pacsurname}}" >
  </div>
  <div class="col-2">
    <label for="inputAddress2" class="form-label  col-form-label-sm" style="font-size:10px">Дата народження</label>
    <input type="text" class="form-control form-control-sm" id="inputAddress2" value="{{Carbon\Carbon::parse($item->pac_born)->format('d-m-Y')}}">
  </div>
    <div class="col-2">
    <label for="inputAddress2" class="form-label  col-form-label-sm" style="font-size:10px">Тел</label>
    <input type="text" class="form-control form-control-sm" id="inputAddress2" value="{{$item->w_tlph}}">
  </div>
      <input type="hidden" class="form-control form-control-sm" name="pac_sex1" value="{{$item->pac_sex}}">
      <input type="hidden" class="form-control form-control-sm" name="pac_fio1" value="{{$item->pac_fio}}">
      <input type="hidden" class="form-control form-control-sm" name="p_payout_id" value="{{$item->p_payout_id}}">
 </div>

 @php $en = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
  'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');  @endphp
   <fieldset class="row border p-2" style="color:red;margin-left:10px;padding: 0 !important; padding-bottom: 2
    margin: 0 !important;">
     <legend class="float-none w-auto p-2 pb-0"  style="font-size:9px;margin: 0px 0px 0px 12px !important; padding: 2 !important;color:#8370DB; ">Панель вибору діагноза </legend>
      <div class="" style="width:40px;height:20px; ">
       <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px;margin-left: 15px">Код</label>
         <select class="form-control form-control-sm diag1" style="width:40px;height: 30px;margin-top: 0!important;padding-top:0 !important">
          <option></option>
           @foreach ($en as $ens)
           <option>{{$ens}}</option>
           @endforeach
         </select>
      <div class="col-5" style="margin: 2px !important; padding: 0 !important;width:300px; ">
      <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="no_oper"  @if(isset($item) && $item->no_oper==1) checked value="1" @else value="0" @endif">
      <label class="form-check-label" for="gridCheck" style="font-size:9px;">
       Тількі терапевтичне лікування
      </label>
    </div>
  </div>
</div>

    <div class="mt-0" style="width:40px;height: 40px" >
    <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px">Шифр</label>
    <input type="text" class="form-control form-control-sm diag2" style="width:40px" value="" >

    </div>
    <div class="mt-0" style="width:40px;height: 40px">
    <label for="posdiacode" class="form-label col-form-label-sm" style="font-size:9px">Шифр</label>
    <input type="text" class="form-control form-control-sm diag3" style="width:40px" value="">
     </div>
     <div class="col-auto" style="margin-left:10px;padding-top:13px; margin: 0;">
       <i class="bi bi-search searchmkb"></i>
</div>
 <div class="col-auto mt-4" style=" margin: 0;">
    <button type="button" class="btn btn-sm btn-orange " data-bs-toggle="modal" data-bs-target="#exampleModalmkb" data-bs-whatever="@mdo" style="margin-right:2px;">Довідник МКБ</button>


     <button type="button" class="btn btn-sm btn-orange" data-bs-toggle="modal" data-bs-target="#exampleModalmkb1" data-bs-whatever="@mdo" style="margin-left:2px;margin-right: 13px;">Довідник по напрямку</button>

</div>
    <div class="col-md-6 pt-0" style="margin: 0px !important; padding: 0 !important; ">
    <label for="posdiacodetext" class="form-label col-form-label-sm pt-0" style="font-size:10px;margin: 0px !important; padding: 0 !important;">Діагноз</label>
    <textarea type="text" class="form-control form-control-sm" id="posdiacodetext" name="posdiacodetext" style="height:100px"> @if(isset($item) && $item->posdiacodetext) {{$item->posdiacodetext}} @endif </textarea>
  </div>

</fieldset>
    <!--Вставка сборного диагноза-->
    <input type="hidden" class="form-control form-control-sm posdiacode" id="posdiacode" name="posdiacode" value="@if(isset($item) && $item->posdiacode) {{$item->posdiacode}} @endif">

 <fieldset class="row border p-2 g-1" style="margin-left:10px;">
  <legend class="float-none w-auto p-2 pb-0"  style="font-size:9px;margin: 0px 0px 0px 12px !important; padding: 2 !important;color:#8370DB; ">Панель вибору операції </legend>

<!--  Направление 1 -->

 <div class="col-md-2" style="margin: 0px !important">
    <label for="inputState" class="form-label col-form-label-sm" style="font-size:10px">Напрямок</label>
   <select id="inputState" class="form-select form-control-xs p_payout_id" name="p_payout_id">
      <option selected value="0">Оберіть...</option>
      @foreach ($p_payout as $p_payouts)
      <option value="{{$p_payouts->id}}" @if(isset($item) && $p_payouts->id==$item->p_payout_id) selected @endif>{{$p_payouts->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-5 pt-0" style="margin: 0px !important">
    <label for="inputState" class="form-label col-form-label-sm" style="font-size:10px">Операция Основная</label>
    <select  class="form-select form-control-sm p_oper" id="p_oper" name="p_oper">
      <option value="0">Choose...</option>
      @foreach ($oper as $item1)
      <option id="{{$item1->timegos}}" data="{{$item1->timeoper}}" value="{{$item1->id}}" @if(isset($item) && $item->p_oper==$item1->id) selected @endif>{{$item1->timegos}}-{{$item1->timeoper}} / {{$item1->u2name}}</option>
      @endforeach
    </select>
  </div>
   <div class="col-md-2" style="margin: 0px !important">
    <label for="inputState" class="form-label col-form-label-sm" style="font-size:10px">Підрозділ</label>
    <select id="inputState" class="form-select form-control-sm" name="subdivision_id">
      <option selected value="0">Choose...</option>
      <option @if(isset($item) && $item->company1_id==1) selected @endif value="1" >Medical Plaza</option>
      <option  @if(isset($item) && $item->company1_id==2) selected @endif value="2">Irini Group</option>
    </select>
  </div>
  <div class="col-auto" style="margin: 0px !important">
    <label for="timeoper" class="form-label col-form-label-sm" style="font-size:10px">Дл-ть опер</label>
    <input type="text" class="form-control form-control-sm" id="timeoper" name="timeoper" value="@if(isset($item) && $item->timeoper) {{$item->timeoper}} @endif"  style="width: 60px">
  </div>

  <div class="col-auto" style="margin: 0px !important">
    <label for="timegos" class="form-label col-form-label-sm" style="font-size:10px">Дл-ть госп</label>
    <input type="text" class="form-control form-control-sm" id="timegos"  name="timegos"  value="@if(isset($item) && $item->timegos) {{$item->timegos}} @endif" style="width: 60px">
  </div>

  <div class="col" style="padding-top: 0 !important;margin-top: 0 !important;height: 10px">
  <div class="form-check " style="padding-top: 0 !important;margin-top: 0 !important;">
  <input class="form-check-input" type="radio" name="viewoper" id="inlineRadio1" @if(isset($item) && ($item->viewoper == 1)) checked @endif value="1" >
  <label class="form-check-label" for="inlineRadio1" style="font-size:10px;">Планова</label>
</div>
<div class="form-check " style="padding-top: 0 !important;margin-top: 0 !important;">
  <input class="form-check-input" type="radio" name="viewoper" id="inlineRadio2" @if(isset($item) && ($item->viewoper == 2)) checked @endif value="2">
  <label class="form-check-label" for="inlineRadio2" style="font-size:10px;">Ургентна</label>
</div>
<div class="form-check " style="padding-top: 0 !important;margin-top: 0 !important;">
  <input class="form-check-input" type="radio" name="viewoper" id="inlineRadio3" @if(isset($item) && ($item->viewoper == 3)) checked @endif value="3">
  <label class="form-check-label" for="inlineRadio3" style="font-size:10px;">Етапна</label>
</div>
</div>

<!--  напрямок2 -->
<div class="row g-1" style="padding: 0 !important;margin: 0 !important;">
<div class="col-md-2" style="margin: 0px !important">
    <label for="inputState" class="form-label col-form-label-sm" style="font-size:10px">Напрямок</label>
   <select id="inputState" class="form-select form-control-xs p_payout1_id" name="p_payout1_id">
      <option selected value="0">Оберіть...</option>
      @foreach ($p_payout as $p_payouts)
      <option value="{{$p_payouts->id}}" @if(isset($item) && $p_payouts->id==$item->p_payout1_id) selected @endif>{{$p_payouts->name}}</option>
      @endforeach
    </select>
  </div>
 <div class="col-md-5 g-1">
  <label for="inputState" class="form-label col-form-label-sm" style="font-size:10px"> Поєднанні та симультантні</label>
    <select id="inputState" class="form-select form-control-xs p_oper1" name="oper2">
      <option selected value="0">Оберіть...</option>
      @foreach ($oper as $item2)
      <option value="{{$item2->id}}" @if(isset($item) && $item->oper2==$item2->id) selected @endif>{{$item2->u2name}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-auto pt-4">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type1" id="gridRadios1" value="1" @if(isset($item) && $item->type1==1) checked @endif>
        <label class="form-check-label col-form-label-sm" for="type1" style="font-size:10px">
          Поедн
        </label>
      </div>
    </div>
    <div class="col-auto pt-4">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type1" id="gridRadios2" value="2" @if(isset($item) && $item->type1==2) checked @endif>
        <label class="form-check-label" for="type2" style="font-size:10px">
          Симуль
        </label>
      </div>
    </div>
 <div class="col-md-1" style="margin: 0px !important">
    <label for="inputState" class="form-label col-form-label-sm" style="font-size:10px">Підрозділ</label>
    <select id="inputState" class="form-select form-control-sm" name="subdivision_id">
      <option selected value="0">Оберіть..</option>
      <option @if(isset($item) && $item->company1_id==1) selected @endif value="1" >Medical Plaza</option>
      <option  @if(isset($item) && $item->company1_id==2) selected @endif value="2">Irini Group</option>
    </select>
  </div>
  <div class="col-3">
  </div>
</div>
<div class="row g-1">
  <div class="col-md-2" style="margin: 0px !important">
   <select id="inputState" class="form-select form-control-xs p_payout2_id" name="p_payout2_id">
      <option selected value="0">Оберіть...</option>
      @foreach ($p_payout as $p_payouts)
      <option value="{{$p_payouts->id}}" @if(isset($item) && $p_payouts->id==$item->p_payout2_id) selected @endif>{{$p_payouts->name}}</option>
      @endforeach
    </select>
  </div>
 <div class="col-md-5">
    <select id="inputState" class="form-select form-control-sm p_oper2" name="oper3">
      <option selected value="0">Оберіть...</option>
     @foreach ($oper as $oper3)
      <option value="{{$oper3->id}}" @if(isset($item) && $item->oper3==$oper3->id) selected @endif>{{$oper3->u2name}}</option>
      @endforeach
    </select>
    </div>
   <div class="col-auto pt-1">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type2" id="gridRadios1" value="1" @if(isset($item) && $item->type2==1) checked @endif>
        <label class="form-check-label col-form-label-sm" style="font-size:10px" for="type3">
          Поедн
        </label>
      </div>
      </div>
       <div class="col-auto pt-1">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type2" id="gridRadios2" value="2" @if(isset($item) && $item->type2==2) checked @endif>
        <label class="form-check-label col-form-label-sm" style="font-size:10px" for="type4">
          Симуль
        </label>
      </div>
</div>
 <div class="col-md-1" style="margin: 0px !important">
    <select id="inputState" class="form-select form-control-sm" name="subdivision_id">
      <option selected value="0">Оберіть..</option>
      <option @if(isset($item) && $item->company1_id==1) selected @endif value="1" >Medical Plaza</option>
      <option  @if(isset($item) && $item->company1_id==2) selected @endif value="2">Irini Group</option>
    </select>
  </div>
  <div class="col-2">
  </div>

 <div class="col-auto" style="margin: 0px !important">
    <label for="d_operplan" class="form-label col-form-label-sm" style="font-size:10px">План дата операции</label>
    <input type="date" class="form-control form-control-sm d_operplan" id="d_operplan" name="d_operplan" @if(isset($item) && ($item->d_operplan !=' ')) value="{{$item->d_operplan}}" @endif style="width: 140px">
 </div>
    <div class="col-auto" style="margin: 0px !important">
       <ul style="margin: 0px !important; padding: 2px;">
            <label for="d_operplan" class="form-label col-form-label-sm" style="font-size:10px">Госпіталізація</label>
            <li> <input class="form-check-input" type="radio" name="datebeforeoper" value="0"> <label class="form-check-label" for="inlineRadio1" style="font-size:10px;">В день</label></li>
            <li><input class="form-check-input" type="radio" name="datebeforeoper" value="1"> <label class="form-check-label" for="inlineRadio1" style="font-size:10px;">Напередодні</label></li>
            <li> <label class="form-check-label" for="inlineRadio1" style="font-size:10px;">За  днів до операції </label> <input class="form-check-input"  type="text" name="datebeforeoper"></li>
        </ul>
    </div>

  <div class="col-auto" style="margin: 0px !important">
    <label for="inputZip" class="form-label col-form-label-sm" style="font-size:10px">План дата госп-ции</label>
    <input type="date" class="form-control form-control-sm d_posplan" id="inputZip" name="d_posplan" @if(isset($item) && ($item->d_posplan !=' ')) value="{{$item->d_posplan}}" @endif style="width: 140px">
  </div>
  <div class="col-auto" style="margin: 0px !important">
    <label for="inputZip" class="form-label col-form-label-sm" style="font-size:10px">План дата выписки</label>
    <input type="date" class="form-control form-control-sm d_outplan" id="inputZip" name="d_outplan" @if(isset($item) && ($item->d_outplan !=' ')) value="{{$item->d_outplan}}" @endif style="width: 140px">
  </div>

  <div class="col-1 " style="margin: 0px !important">
     <label for="inputZip" class="form-label col-form-label-sm" style="font-size:10px">Номер палаты</label>
      <input type="text" name="palata_id"  class="form-control form-control-sm" @if(isset($item->palata_id)) value="{{$item->palata_id}}" @endif>
      <input type="hidden" name="bag_id" value="{{$item->bag_id}}">
      <input type="hidden" name="oldbag_id" value="{{$item->bag_id}}">
{{--     <select id="inputState" class="form-select form-control-sm" name="palata_id">--}}
{{--      <option selected>Choose...</option>--}}
{{--     @foreach ($palat as $item99)--}}
{{--     <option value="{{$item99->id}}" @if($item99->name==$item->palata_id) selected @endif>{{$item99->name}}</option>--}}
{{--     @endforeach--}}
{{--    </select>--}}
  </div>
    <div class="col-auto" style="margin: 0px !important">
    <label for="inputZip" class="form-label col-form-label-sm" style="font-size:10px">Номер оперблока</label>
     <select id="inputState" class="form-select form-control-sm p_operblock_id" name="p_operblock_id">
      <option  >Choose...</option>
      @foreach ($operbl as $operbls)
      <option value="{{$operbls->id}}" @if(isset($item) && $item->p_operblock_id==$operbls->id) selected @endif>{{$operbls->id}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-auto" style="margin: 0px !important">
    <label for="inputState" class="form-label col-form-label-sm" style="font-size:10px">Врач</label>
    <select id="inputState" class="form-select form-control-sm" name="user_id" placeholder="Обрати" required>
      <option value="0">Choose...</option>
       @foreach ($user1 as $users1)
      <option value="{{$users1->id}}" @if(isset($item) && $item->user_id==$users1->id) selected @endif>{{$users1->fullname}}  {{$item->user_id}} </option>
      @endforeach
    </select>
  </div>

 <div class="col-auto " style="margin: 0px !important;padding-top: 25px">
    <button type="button" class="btn btn-orange btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModaloper">Графік операцій</button>
  </div>
   <div class="col-auto " style="margin: 0px !important;padding-top: 25px">
    <a type="button" class="btn btn-orange btn-sm " href="{{route('soposnibrizki', $item->nib)}}" target="_blanck">Ризики</a>
  </div>
  <div class="col-auto " style="margin: 0px !important;padding-top: 25px">
      <button type="button" class="btn btn-orange opengr btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalgraf">ГГрафік ліжок</button>
      <button type="button" class="btn btn-orange opengrall btn-sm" data="{{Carbon\Carbon::now()->format('Y-m-d')}}" data1="{{Carbon\Carbon::now()->addDay(60)->format('Y-m-d')}}" data-bs-toggle="modal" data-bs-target="#exampleModalgraf">Графік ліжок повний</button>
  </div>
</div>
</fieldset>

<div class="row">
  <table class="table table-bordered table-sm caption-top" style="width: 20%">
    <caption>Унікальне обладнання</caption>
    <tr>
      <th style="width: 3%">#</th>
      <th>Назва</th>
    </tr>

<!--  hidden отправляем чтоб всегда приходило значение, если было в базе то с ид, если нет то 0 если было но не выбрали придет 01 для удаления -->
@if(isset($all))
  @foreach($all as $device)
   <tr>
     @if(isset($device->comm1) && $device->comm1==1)
      <input type="hidden" name="device[{{$device->id}}]"  value="01">
      @endif
      <td><input type="checkbox" name="device[{{$device->id}}]"  @if(isset($device->comm1) && $device->comm1==1) checked  value="{{$device->id}}" @else value="0" @endif ></td>
      <td>{{$device->name}} </td>
    </tr>
  @endforeach
  @endif
  </table>
     <div class="col-md-5" style="margin: 0px !important">
    <label for="inputCity" class="form-label col-form-label" style="font-size:10px">Комментарий</label>
    <textarea type="text" class="form-control form-control-sm " id="inputCity"> @if(isset($item)) {{$item->comment}} @endif </textarea>
  </div>
</div>
  <div class="col-6">
    <button class="btn btn-primary sendform">Зберегти направлення </button>
  </div>
    <div class="col-6">
    <a type="button" class="btn btn-secondary sendform" href="{{route('filter')}}">Закрити направлення </a>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModalgraf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-scrollable canvas " >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

 <div class="modal-bodys">
     @include('back.filter.brick-grpacient')


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</form>

<div class="modal fade" id="exampleModalmkb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-body">
       @include('back.spr.mkb.mkb-brick')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary enterdiag" data-bs-dismiss="modal">Записати</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModaloper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-body">
       @include('back.filter.operblock')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary sendoperblock" data-bs-dismiss="modal">Записати</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModalmkb1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-body">
       <!-- Вывод существующего направдения -->
        <div class="form-inline mt-2 col-7">
    <input class="form-control mr-sm-2 nam" type="search" name="id"  placeholder="Пошук по словосполученню" aria-label="Пошук" >
    <!--<button class="btn btn-outline-success my-2 my-sm-0 nams" >Пошук</button>-->
 </div>
<table  class="table table-sm table-bordered mt-3" style="width:90%" id="myTable">
  <thead>
    <tr>
      <th class="head otstup " >#</th>
      <th class="head otstup ">Діагноз</th>
      <th class="head otstup ">Напрямок</th>
    </tr>
  </thead>
  <tbody>
      @if(isset($soDiagnoz))
      @foreach($soDiagnoz as $querys)
    <tr>
      <th class="otstup ">{{$loop->iteration}}</th>
      <td class="otstup "><input type="radio" name="so_diag" code="{{$querys->kodmkb}}" value="{{$querys->kodmkb}} {{$querys->name}}">{{$querys->kodmkb}} {{$querys->name}}</td>
      <td class="otstup "> {{$querys->payoutname}}</td>
  </tr>
@endforeach
@endif
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Записати</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('js')

<script src="{{asset('myjquery/jquery.min.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script>

$(document).ready(function(){

   });


  $('body').on('click',  '.data-right', function() {
    // var  value = $('#posdiacode').val().toUpperCase();
  //alert( $(this).closest('th.data').attr('data'));
   var hook='next';
   BaseRecord1.operblock($(this).closest('th.data').attr('data'), hook);
});

  $('body').on('click',  '.data-left', function() {
    // var  value = $('#posdiacode').val().toUpperCase();
   var hook='back';
   BaseRecord1.operblock($(this).closest('th.data').attr('data'), hook);

});

  $('body').on('change',  "input[name='operdata']", function() {
    // var  value = $('#posdiacode').val().toUpperCase();
   var hook=$("input[name='operdata']:checked").val();

   var hook1=($(this).closest('tr').find(".operblockname").val());
   //$("input[name='operblockname']:checked").val();

   // alert(hook);
   $(".d_operplan").val(hook);

   $(".p_operblock_id").val(hook1);

   //Взять дату операции hook взять проститать дату поступления и вставить выписку
      // длительность госпитализации
      var gosp = $('#timegos').val();
      //за сколько дней
      var daybefore = $("input[name='datebeforeoper']").val();

      if (daybefore == 0){
          $('.d_posplan').val(hook);
          //К дате операции прибавляем длительность госпит и в выписку
          var y = moment(hook).add('days', gosp).format('YYYY-MM-DD');
          $('.d_outplan').val(y);
      }
      if (daybefore == 1){
          //Взятую дату операции приводим к нужному формату и убираем 1 день
          var y = moment(hook).subtract('days', 1).format('YYYY-MM-DD');
          $('.d_posplan').val(y);

          var x = moment(hook).add('days', gosp).format('YYYY-MM-DD');

          $('.d_outplan').val(x);
      }
      if (daybefore > 1){
          //Взятую дату операции приводим к нужному формату и убираем 1 день
              var y = moment(hook).subtract('days', daybefore).format('YYYY-MM-DD');
          $('.d_posplan').val(y);

          var x = moment(hook).add('days', gosp).format('YYYY-MM-DD');

          $('.d_outplan').val(x);
      }
     });

  $('body').on('change',  '.p_payout_id', function() {
    // var  value = $('#posdiacode').val().toUpperCase();
  var vf='.p_payout_id';
  BaseRecord1.p_payout($(".p_payout_id option:selected").val(),vf);
});

  $('body').on('change',  '.p_payout1_id', function() {
    // var  value = $('#posdiacode').val().toUpperCase();
  var vf='.p_payout1_id';
  BaseRecord1.p_payout($(".p_payout1_id option:selected").val(),vf);
});

  $('body').on('change',  '.p_payout2_id', function() {
    // var  value = $('#posdiacode').val().toUpperCase();
  var vf='.p_payout2_id';
  BaseRecord1.p_payout($(".p_payout2_id option:selected").val(),vf);
});



   $("select[name='p_oper']" ).change(function() {
      var c =$("#p_oper option:selected").attr('id');
      var b = $("#p_oper option:selected").attr('data');
       $("#timegos").val(c);
      $("#timeoper").val(b);
});

   $('.opengr').click(function() {
     //var  value = $('#posdiacode').val().toUpperCase();
  //alert('value');
 //$(this).closest('div.ur1').find('i').attr('class');
 var d_posplan = $("input[name='d_posplan']").val();

 var d_outplan = $("input[name='d_outplan']").val();

     BaseRecord1.grpacient(d_posplan, d_outplan);
});

   //Кнопка открівает большой график палат на 60 дней
$('.opengrall').click(function() {
   BaseRecord1.grpacient($(this).attr('data'), $(this).attr('data1'));
});




$("body").on('click',".enterdiag", function () {
     $("#posdiacodetext").val($('.mkb4').val());

});

$("body").on('change',"input[name='name_diagnoses']:checked", function () {
     $(".mkb4").val($(this).attr('data'));
     $("#posdiacode").val($(this).attr('code'));
});

$("body").on('change',"input[name='so_diag']:checked", function () {
  var el = $(this).val();
   $(".nam").val(el);
     $("#posdiacodetext").val(el);
     $("#posdiacode").val($(this).attr('code'));
});




// //После выбора буквы мкб и шрифта нажатие кнопки Посик
// $(document).on('click', '.searchmkb',function(e){
//  var g =$('.mkb1').val();
//  var g1 =$('.mkb2').val();
//  var g2 =$('.mkb3').val();
//  var mkbdiag= g+g1+'.'+g2;
//  var arr=BaseRecord.diagnoses;
//    var data_json2=(arr.filter(arr =>arr.code === mkbdiag));
//      str_json2="";
//     for(var i in data_json2) {
//        str_json2+=data_json2[i]['namedia'];
//     }
//     if(str_json2 == ''){
//       $(".mkb4").val('Діагноз  ненайдено');
//     }
//     else{
//       $(".mkb4").val(str_json2);
//     }
// });

//Очистка формы после поиска по мкб
$(document).on('click', '.mkbdell',function(e){
  $(".mkb4").val(' ');
});

//Работа с датой при віборе дней госпитализации
$(document).on('change', "input[name='datebeforeoper']", function(e){
    //Значение по клику о госпитализации
   var day = $(this).val();
   //Длительность госпитализации
   var gosp = $('#timegos').val();
if (!gosp) {
    alert('Не обрано тривалість госпеталізації');
}
else {
    var operplan = $('.d_operplan').val();

    if (day == 0){
        $('.d_posplan').val(operplan);

        var y = moment(operplan).add('days', gosp).format('YYYY-MM-DD');

        $('.d_outplan').val(y);
    }
    if (day == 1){
        //Взятую дату операции приводим к нужному формату и убираем 1 день
        var y = moment(operplan).subtract('days', 1).format('YYYY-MM-DD');
        $('.d_posplan').val(y);

        var y = moment(operplan).add('days', gosp).format('YYYY-MM-DD');

        $('.d_outplan').val(y);
    }
    if (day > 1){
        //Взятую дату операции приводим к нужному формату и убираем 1 день
        var value = $(this).val();
        var y = moment(operplan).subtract('days', value).format('YYYY-MM-DD');
        $('.d_posplan').val(y);

        var y = moment(operplan).add('days', gosp).format('YYYY-MM-DD');

        $('.d_outplan').val(y);
    }


}
});

//Форма поиска по словосочетанию
$('body').on('change', '#timegos',function(e){
    // alert('ok');
    $("input[name='datebeforeoper']").prop('checked', false);
})


//Форма поиска по словосочетанию
 $('body').on('click', '.btnmkbdiag',function(e){
   var nam=$('.mkbdiag').val();
   BaseRecord.gr13($('.mkbdiag').val());
})


$(document).on('change', '.id_palat', function () {
   //вставляем дату вібора палаті и госпитализации
    var  datagosp = $(this).closest('td').find('.id_palat').attr('id');

    //alert (datagosp);
    $(".d_posplan").val(datagosp);

        //вставляем номер палаті для so_pos
    $("input[name='palata_id']").val($(this).closest('tr').find('.datap').attr('data'));

    //вставляем ид койки в скрітую кнопку
    $("input[name='bag_id']").val($(this).closest('td').find('.id_palat').val());
     //BaseRecord.grpacient();
     //Длительность госпитализации
    var gosp = $('#timegos').val();

    var y = moment(datagosp).add('days', gosp).format('YYYY-MM-DD');

    $('.d_outplan').val(y);

});


 $(".nam").on("keyup", function() {
    var  value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
var BaseRecord1={

   grpacient: function(post, out){
       // alert(post);
       // alert(out);
      var ajaxSetting={
        method: 'get',
        url: '/grpacient/',
         data: {
           hook: 'gr',
             post:post,
             out:out,
        },
        success: function(data){
            //alert(data);
        $(".modal-bodys").html(data.table);
        },
        error: function(data){
           alert(data.responseText);
        },
      };
      $.ajax(ajaxSetting);
   },
   operblock: function(data, hook){
    // alert(hook);
    // alert(data);
      var ajaxSetting={
        method: 'get',
        url: '/addsurgery/'+'1',
         data: {
           hook: hook,
           data:data,
        },
        success: function(data){
          //alert(data.table);
        $(".operdata").html(data.table);
        },
        error: function(data){
           alert(data.responseText);
        },
      };
      $.ajax(ajaxSetting);
   },
      p_payout: function(data, clas){
    // alert(hook);

        var var1=data;
   var percent = <?php echo json_encode(session('alloper')); ?>;

 var str_json2='<option>'+'</option>';;
   for(var i in percent) {
    if (percent[i].p_payout == var1) {
      var v = percent[i].u2name;
     str_json2 += '<option value="'+percent[i].id+'"  id="'+percent[i].timegos+'" data="'+percent[i].timeoper+'">'+percent[i].timegos+'/'+percent[i].timeoper+'-'+percent[i].u2name+'</option>';
    }
  }

if(clas =='.p_payout_id'){
  $(".p_oper").html(str_json2);
}
if(clas =='.p_payout1_id'){
  $(".p_oper1").html(str_json2);
}
if(clas =='.p_payout2_id'){
  $(".p_oper2").html(str_json2);
}

      $.ajax(ajaxSetting);
   },

};

</script>
@endsection
