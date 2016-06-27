 @include('......forms._basic.default',
['model' => 'action','method' => 'add','type'=>'modal','model_id'=>$data->id,'item'=>$data])

<a type="button" data-toggle="modal" data-target="#action_add_modal">
	<span class="{{ isset($remove) ? 'red_color' : '' }} pull-right fa-stack fa-2x">
	     <i class="icon fa fa-circle-thin fa-stack-2x"></i>
	     	@if(!isset($remove))
	       		<i class="icon fa fa-plus fa-stack-1x"></i>
	       @else
	       		<i class="icon fa fa-remove fa-stack-1x"></i>
	       @endif
	   </span>
</a>



