<!-- Холера тиф паратиф -->

  @if(isset($ws1))
  @foreach ($ws1 as $value1)
<div class="spr2">
  <i class="bi bi-plus"></i> 
    <span class="url2 text-muted" id="{{$value1->gr2}}" data="{{$value1->id}}"  style="font-family: Roboto;font-size: 0.8rem; font-weight: 400;line-height: 1.5;
     text-align: left; background-color: #fff;"> {{$value1->name_diagnoses }} </span>
      <!--   последнее уточнение -->
     <div class="mkbur4{{$value1->id}}" style="margin-left: 20px;">   @include('back.spr.mkb.mkbur3') </div>
</div>
  @endforeach
  @endif

 