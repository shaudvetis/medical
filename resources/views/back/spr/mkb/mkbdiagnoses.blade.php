
 @if(isset($query))
  @foreach ($query as $value)
   <p class="text-muted ml-2 mr-2 namedia"> <input type="radio" name="name_diagnoses" class="name_diagnoses" data="{{$value->code }} {{$value->name_diagnoses}}" code="{{$value->code }}" value="{{$value->code}}" data1="{{$value->gr2}}"> 
   {{$value->code }} {{$value->name_diagnoses }} </p><br>
      <!--   последнее уточнение -->
  @endforeach
  @endif

