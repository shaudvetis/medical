<div class="tableid table-responsive">
 <table class="table table-bordered" style="overflow: scroll;">
  <tr style="text-align: center;" class="trheat">
   <td style="text-align: center;" class="table-responsive"> Палати</td>
   @if(isset($m2) )

      @foreach ($m2 as $m1)
   <th style="text-align: center;font-size:10px" class="data">{{Carbon\Carbon::parse($m1)->format('d-m')}}</th>
   @endforeach
        <td style="text-align: center;" class="table-responsive"> Палати </td>
   </tr>
   @foreach($rt as $key => $value)
         @php

             $palatatext = explode("-", $key);

               $palata = $palatatext[0];
               $bag = $palatatext[1]
         @endphp

    <tr class="id_palattr">
    <td class="datap" style="text-align: center;font-size:10px" data="{{$palata}}" data1="{{$bag}}">П-{{$palata}}-кр {{$bag}} -{{$cont}} </td>
@php $cont = strval($cont); @endphp

 @for($j = 0; $j <= $cont; ++$j)
    <td class="id_palattd" style="text-align: center;font-size:10px; background-color:{{$value['color'][$j]}};" title="@if(isset($value['nib'][$j])) {{$value['nib'][$j]}} @endif" >@if (isset($value['pac_sex'][$j]) && $value['pac_sex'][$j]==1) <span style="color:blue;">М </span>@endif
    @if (isset($value['pac_sex'][$j]) && $value['pac_sex'][$j]==2) <span style="color:red;"> Ж</span> @endif
      @if (isset($value['bron'][$j]) && $value['bron'][$j]==1) <span style="color:green;"> Б</span> @endif
       <input type="checkbox" class="id_palat"  id="{{$value['datas'][$j]}}" name="id_palat" value="{{$value['bag_id'][$j]}}" @if (isset($value['pac_sex'][$j])) checked @endif @if (isset($value['bron'][$j]) && $value['bron'][$j]==1) checked @endif>
             </td>

@endfor
        <td class="datap" style="text-align: center;font-size:10px">П-{{$palata}} -кр- {{$bag}}</td>
        <tr>
             <td></td>
             <td></td>
         </tr>
    </tr>

    @endforeach
    @endif
    </table>
        <button type="button" class="btn btn-primary bron">Бронювати</button>
    </div>



