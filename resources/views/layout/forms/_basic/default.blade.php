    {{-- <div class="loader"></div> --}}
    <div class="{{ $type == 'modal' ? 'modal fade' : '' }}" id="{{ $model.'_'.$method .'_modal'. ($modal_data != null ? $modal_data->id : '') }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="{{ $type == 'modal' ? 'modal-dialog' : 'col-md-12' }} text-center" role="document">
        <div class="{{ $type == 'modal' ? 'modal-content' : '' }}">{{--panel col-lg-offset-4 col-lg-4--}}

            @if($type == 'modal')
               <div class="visible-xs logo_form logo"></div>
               <div class="hidden-xs content text-center"><h3> <div class="logo"></div><p>Sovpal.Ru</p></h3> </div>
               <button model="button" class="close close_form" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @endif

            {{-- <input name="room_id" type="hidden" value="{{ $room_id }}"> --}}
            <form action="{{ route($model.'.'.$method, $modal_data != null ? [$modal_data->type => $modal_data->id] : '') }}"
                method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                @if( $method == 'update' ) {{ method_field('PUT') }} @endif
                {!! csrf_field() !!}

                <fieldset>@include('layout.forms.'.$model.($method == 'store' || $method == 'update' ? null : '.'.$method))</fieldset>

              @if($type == 'panel' || $type == 'modal')
              {{-- <div class="form_loader"></div> --}}
                  {{--<div class="row progress-wrap progress_loading" data-progress-percent="25"><div class="progress-bar progress_loading"></div></div>--}}
                  <div class="col-md-12 text-center" id="footer_down">
                    <button class="btn btn_grey visible_xs col-xs-6 hidden-sm hidden-md hidden-lg" data-dismiss="modal" aria-label="Close">
                      <span class="size14">{{ trans('sovpal.forms.Close') }}</span>
                    </button>
                    <button class="btn btn_submit col-xs-6 col-sm-12" type="submit">
                      <span class="size14">{{ $button or trans('sovpal.forms.Create') }}</span>
                    </button>
                  </div>
              @endif
            </form>

        </div>
      </div>
  </div>

@if($type == 'modal' && count($errors) > 0 )
  <script>
    $(document).ready(function (){
        var modal_id = $('.modal').attr('id');
        $(function() {$('#' + modal_id).modal('show');});
    });
  </script>
@endif





