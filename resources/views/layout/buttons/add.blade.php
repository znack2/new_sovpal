 @include('layout.forms._basic.default', 
['model' => 'action','method' => 'add','type'=>'modal','data'=>$data])

<a type="button" data-toggle="modal" data-target="#action_add_modal">
	<span class="{{ isset($remove) ? 'red_color' : '' }} pull-right fa-stack fa-2x">
	     <i class="icon fa fa-circle-thin fa-stack-2x"></i>
         <i class="icon fa fa-{{ !isset($remove) ? 'plus' : 'remove' }}fa-stack-1x"></i>
	   </span>
</a>



