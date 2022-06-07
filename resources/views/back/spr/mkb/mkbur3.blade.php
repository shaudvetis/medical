
  @if(isset($ws2))
    @foreach($ws2 as $value2)
      <i class="bi bi-dash"></i> 
      <span class="ur3"  id="{{$value2->gr3}}" data="{{$value2->id}}" value="{{$value2->gr3}}" style="font-family: Roboto;font-size: 0.8rem; font-weight: 400;line-height: 1.5;
     text-align: left; background-color: #fff;">{{$value2->name_diagnoses }}
       </span><br>
 
     @endforeach

   @endif
