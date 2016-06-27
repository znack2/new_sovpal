
<div class="modal fade" id="{{ strtolower(class_basename($model)) }}_remove_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

       <div class="content text-center">
          <h3>
           <div class="logo"></div>
           <p>Sovpal.Ru</p>
          </h3>
      </div>

      <div class="modal-header">
        <h4 class="form-heading text-center"> {{ trans('sovpal.forms.AreYouSure'). $model->title or $model->name  }} ?</h4>
        @if(isset($message)) <p class="minitext text-center"> {!! trans('sovpal.forms.'.$message) !!} </p> @endif
        {{-- <button model="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
      </div>

{{--       @if($currentUser->id == $model->user->id)
      {{ $method = 'destroy' }}
      @else
      {{ $method = 'remove' }}
      @endif --}}

		<form action="{{ route(strtolower(class_basename($model)).'.destroy',['user'=>$currentUser->id,class_basename($model)=>$model->id]) }} "
    method="POST" style="margin-bottom:0;" >

    @if(isset($room_id))
        {{-- just for add elements --}}
        <input name="room_id" type="hidden" value="{{ $room_id }}">
    @endif

		  {{ csrf_field() }}
		  {{ method_field('DELETE') }}

		  <div class="modal-footer footer">
		      <div class="col-sm-offset-3 col-sm-6">
		          <button class="btn btn_submit" model="submit" data-confirm="{{ trans('sovpal.forms.Are you sure?') }}">{{ trans('sovpal.forms.Delete') }}</button>
		      </div>
		  </div>

		</form>
    </div>
  </div>
</div>
