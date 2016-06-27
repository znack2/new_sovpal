 @include('layout.forms._basic.default', 
['model' => 'action','method' => 'join','type'=>'modal','data'=>$data])

    <a class="link" type="button" data-toggle="modal" data-target="#action_join_modal">
      <div class="{{ isset($remove) ? 'red_color' : '' }} profile_button">
          <span class="added_icon">
            <i class="icon fa fa-{{ !isset($remove) ? 'plus' : 'remove' }}"></i>
          </span>
      </div>
    </a>
