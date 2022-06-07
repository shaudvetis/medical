<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medical Program</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('NiceAdmin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('NiceAdmin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('NiceAdmin/assets/css/style.css')}}" rel="stylesheet">
 
  <!-- My css -->
  <link href="{{ asset('mycss/medical.css')}}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
</style>
</head>

<body>
 <form method="post" action="{{route('postnibrizki')}}">

     {{ csrf_field() }}
    {{ method_field('POST') }} 

<input type="hidden" name="nib" value="{{$id}}">
 <div class="row ml-3">
  <div class="col">
  
   @if(isset($query12))
    
<table class="table table-bordered mt-2"  style="width:70%">
  <thead>
    <tr>
      <th class="head otstup"  style="width: 50%" >Назва</th>
<!--       <th class="head otstup"  style="width: 4%" >Бал тромборизику</th> -->
      <th class="head otstup" style="width: 5%"><i class="bi bi-check-lg"></i></th>
    </tr>
  </thead>
  <tbody>

@php $sumrizk1=0; @endphp

 @foreach($query12['group1'] as $item)
   
   @if(isset($item->so_risk_id) && ($item->id==$item->so_risk_id) && ($item->nball !=0))  @php  $sumrizk1 +=$item->nball; @endphp
 @endif

   @if($item->ngroup==1)
    <tr>
      @if(isset($item->id) && ($item->id==$item->so_risk_id))
      <input type="hidden" name="id[{{$item->id}}]"  value="01">
      @endif 
<!--       <th class=" otstup">{{$loop->iteration}}</th> -->
      <td class=" otstup " @if($item->ntitle==1) style="color:{{$item->color}};font-weight: bold;"  @endif>{!!$item->nametromb2!!} \ {!!$item->id!!} </td>
     <!--  <td class=" otstup" >@if($item->ntitle !=1 && $item->nball !=0) {{$item->nball}} @endif</td> -->
      <td  class="otstup"> @if($item->ntitle !=1 ) <input type="checkbox" name="id[{{$item->id}}]" @if(isset($item->so_risk_id) && ($item->id==$item->so_risk_id) ) checked  value="{{$item->id}}"  @else value="0"  @endif> @endif </td>
   </tr>
   @endif
 @endforeach

  </tbody>
</table>
</div>

<div class="col">
<table class="table table-bordered mt-2"  style="width:70%">
  <thead>
    <tr>
      <th class="head otstup"  style="width: 50%" >Назва</th>
      <th class="head otstup" style="width: 5%"><i class="bi bi-check-lg"></i></th>
    </tr>
  </thead>
  <tbody>

 @foreach($query12['group2'] as $item)
    <tr>
      @if(isset($item->id) && ($item->id==$item->so_risk_id))
      <input type="hidden" name="id[{{$item->id}}]"  value="01">
      @endif 
      <td class="otstup" style="width: 50%; @if($item->ntitle !=0) color:{{$item->color}};font-weight: bold;  @endif">{!!$item->nametromb2!!} \ {!!$item->id!!}@if($item->id==60) {{$sumrizk1}} @endif </td>
    <!--   <td class=" otstup" >@if($item->ntitle !=1 && $item->nball !=0) {{$item->nball}} @endif</td> -->
      <td  class=" otstup " style="width: 5%"> @if($item->ntitle !=1 ) <input type="checkbox" name="id[{{$item->id}}]" @if(isset($item->so_risk_id) && ($item->id==$item->so_risk_id) ) checked  value="{{$item->id}}" @else value="0"  @endif> @endif </td>
   </tr>

 @endforeach

  </tbody>
</table>

<div>
 <hr>
 <button type="subbmit" class="btn btn-secondary">ТЭО </button>
</div>
<button type="subbmit" class="btn btn-secondary mt-5">Зберегти </button>
<button class="closerisk btn btn-danger ml-7 mt-5">Закрити</button>
</div>

@endif

</form>

</div>

<script src="{{asset('myjquery/jquery.min.js')}}"></script>
<script>

$(document).ready(function(){
  $('.closerisk').click(function(event) {
      event.preventDefault();
   window.close();
 });
});
</script>

</body>
</html>