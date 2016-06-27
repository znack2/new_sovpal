 @include('......forms._basic.default',
['model' => 'action','method' => 'join','type'=>'modal','model_id'=>$data->id])

    <a class="link" type="button" data-toggle="modal" data-target="#action_join_modal">
      <div class="{{ isset($remove) ? 'red_color' : '' }} profile_button">
          <span class="added_icon">
          	@if(!isset($remove))
            	<i class="fa fa-plus"></i>
            @else
            	<i class="fa fa-remove"></i>
            @endif
          </span>
      </div>
    </a>
