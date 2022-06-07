<ul @if (!empty($child)) class="child" @endif>
	@foreach($categories as $category)
      <li> <i class="icon-plus-circled"></i> {{ $category->name }}</li>
      @if (count($category->children) > 0 )
         @include('categories.list',['categories' => $category->children, 'child' => true])
      @endif
	@endforeach
</ul>