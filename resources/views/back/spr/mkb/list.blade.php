<ul @if (!empty($child)) class="child" @endif>
	@foreach($mkb_group as $mkb_groupone)
      <li @if(empty($mkb_groupone->gr2) && empty($mkb_groupone->gr3)) class="{{$mkb_groupone->gr1}}" data="ur1" @elseif (!empty($mkb_groupone->gr2) && (empty($mkb_groupone->gr3))) class="{{$mkb_groupone->gr2}}" data="ur2"  @elseif (!empty($mkb_groupone->gr2) && (!empty($mkb_groupone->gr3))) class="{{$mkb_groupone->gr3}}" data="ur3" @endif> <i class="icon-plus-circled"></i> {{ $mkb_groupone->name_diagnoses }}</li>
      @if (count($mkb_groupone->children) > 0 )
         @include('back.spr.mkb.list',['mkb_group' => $mkb_groupone->children, 'child' => true])
       
      @endif

	@endforeach
	
</ul>