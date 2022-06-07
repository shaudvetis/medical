<li>{{ $project['name_diagnoses'] }}</li>
	@if (count($project['children']) > 0)
	    <ul>
	    @foreach($project['children'] as $project)
	                @include('back.spr.mkb.project', $project)
	    @endforeach
	    </ul>
	@endif