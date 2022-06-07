@extends('medical')

@section('content')

<style>
	ul.child {
      display: none;
      opacity: 0; 
	}
	ul.child.active {
      display: block;
      opacity: 1;
	}
</style>
@if (count($categories) > 0)
 <div id="categorieslist" >
  @include('categories.list',['categories' => $categories])
 </div>
@else
  {{ __('No found') }}
@endif

@endsection


