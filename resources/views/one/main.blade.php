@extends('layout.app')

@section('content')

	@include('one.sidebar')
	
	<div class="col-xs-12 col-sm-8 col-md-5 panel">
		@include('one.menu')
		<div class="posting_block tab-content">

	    	@if(class_basename($data) == 'Item')
	    		@include('one.item')
	    	@elseif(class_basename($data) == 'Group')
	    		@include('one.group')
  			@endif
        </div>    
        
    	@include('one.footer')
	</div>

<div class="hidden-sm hidden-xs col-md-2">
	@include('layout.blogs')
</div>

@endsection