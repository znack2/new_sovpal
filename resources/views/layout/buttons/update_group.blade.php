@include('layout.forms._basic.default',
['model' => 'group', 'method' => 'update', 'type'=>'modal','data' => $group])

 <a class="link" type="button" data-toggle="modal" data-target="#group_update_modal{{ $item->id or '' }}">
     <div class="profile_button">
       <span class="pull-right fa-stack fa-lg">
         <i class="icon fa fa-circle-thin fa-stack-2x"></i>
         <i class="icon fa fa-edit fa-stack-1x"></i>
       </span>
     </div>
 </a>