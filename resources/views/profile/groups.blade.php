@extends('layout.app')

@section('content')

@include('profile.sidebar')


<div class="col-xs-12 col-sm-8 col-md-6 panel">
    @include('profile.menu')  
<div class="row posting_block">
	<h4 class="size18 bold text-center">{{ trans('sovpal.'.Request::input('section')) }} :
    <div class="dropdown">
        <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-question-circle"></i></a>
        <ul class="dropdown-menu" role="menu">
            <li class="size10 blue_c text-center">
                {{ trans('sovpal.profile.'.$data->type .'.'. Request::input('section').'.Help') }}
            </li>
        </ul>
    </div>
    </h4>
    <br>
		<div id="rooms" class="col-md-12">
		    <div class="row room_list">

			    <table class="table table-striped">

			        @if(!$data['items']->isEmpty())
		    			@include('layout.lists.groups') 
	    			@elseif($currentUser->id == $data->id && $data->type == 'shop' &&  $data->items()->count() == 0)
		    			<tr>
		    			    <td><span class="text-center">
		    			  <h4><a class="link" href="{{ route('profile',['user'=>$data->slug,'page'=>'rooms']) }}" >
		    			    {{ trans('sovpal.FirstCreateItem') }}</a></h4></span></td>
		    			</tr>
	    			@elseif($currentUser->id == $data->id && $data->type == 'shop' &&  $data->items()->count() > 0)
	    				@include('layout.buttons.create_group',['group'=>null])
    				@elseif($currentUser->id == $data->id)
    					<div class="text-center">
    						<a href="{{ route('groups',['type'=>'items']) }}" class="btn link">{{ trans('sovpal.DiscoverNewGroup') }}</a>
    					</div>
	    			@else
	    				@include('layout.forms.ajax.empty_profile',['modal_data'=>null])
	    			@endif


	    		</table>

	    	</div>
	    </div>
	    <br> 
</div>
    @include('profile.footer')
</div>

<div class="hidden-sm hidden-xs col-md-2">
	@include('layout.blogs')
</div>

@endsection    


