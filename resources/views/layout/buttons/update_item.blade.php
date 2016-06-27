@include('layout.forms._basic.default',['model' => 'item','method' => 'update','type'=>'modal','data' => $item])

	<a class="link" type="button" data-toggle="modal" data-target="#item_update_modal{{ $item->id or '' }}">
      <i class="fa fa-edit"></i>
	</a> 