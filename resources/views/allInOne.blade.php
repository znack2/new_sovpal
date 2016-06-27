index/actions
  {{--<a type="button" data-toggle="modal" data-target="#action_like_modal" class="{{ liked($item->id) }} link btn btn-blog">--}}
    {{--<i class="fa fa-heart"></i>--}}
  {{--</a>--}}
  index/icons
{{-- <a type="button" data-toggle="modal" data-target="#action_like_modal" class="{{ $item->checkLiked() }} link btn btn-blog"></a> --}}
index/sort
{{-- <div class="visible-sm col-sm-12">
    @include('layout.blogs')
</div> --}}


{{--
@foreach($tags as $category_type => $category)
           {{ trans('tags.'.$category_type) }}
       @foreach($category as $tag)
             {{ trans('tags.'.$tag->name) }}
             {{ $tag->getCount(Request::input('type'))}}
         @endforeach
@endforeach --}}


{{--         <ul class="visible-xs visible-sm nav" id="small-menu">
            <li><a href="#" class="text-center"><i class="fa fa-list-alt"></i></a></li>
            <li><a href="#" class="text-center"><i class="fa fa-list"></i></a></li>
            <li><a href="#" class="text-center"><i class="fa fa-paperclip"></i></a></li>
            <li><a href="#" class="text-center"><i class="fa fa-refresh"></i></a></li>
        </ul> --}}
        profile/one_room
        {{--@if($currentUser->id == $data->id && $data->type == 'owner')--}}
        	 {{--<div class="row text-center">--}}
        	     {{--<div class="controls hidden-xs">--}}
        	         {{--<a class="fa fa-chevron-left btn" href="#carousel" data-slide="prev">--}}
        	         {{--{{ trans('sovpal.Elements') }}({{ $room->element_count }})</a>--}}

        	         {{--<a class="btn" href="#carousel" data-slide="next">{{ trans('sovpal.Items') }}--}}
        	         {{--({{ $room->item_count }})<i class="fa fa-chevron-right"></i></a>--}}
        	     {{--</div>--}}
        	 {{--</div>--}}
        {{--@endif--}}

        {{-- @include('layout.forms.ajax.room_extra') <hr> --}}
        profile/sidebar
         {{--            @if($data->type == 'profi')
                      <ul class="list-group">
                        @foreach($data->getTag('skill') as $skill)
                          <li><p class="size14 bold">{{ $skill }}</p></li>
                        @endforeach
                      </ul>
                    @endif --}}
                 {{-- ask contacts button --}}
layout/app
                {{-- <div class="content text-center"> <h3><span class="logo"></span><p>Sovpal.Ru</p></h3> </div>  --}}
                        {{-- @yield('scripts', '') --}}
                    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
                        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
layout/blogs
{{-- @foreach($ads as $ad) --}}
{{-- <div class="blog-ads">
   <img src="#" class="pic_ina img-thumbnail"/>
     <span class="text bold">{{ $ad->title }} </span<br>
     <span>{{ $ad->body }}</span><br>
     some text
    <div class="blog-actions"><a href="#" class="minitext">{{ $ad->link }}</a>
    </div>
</div> --}}
{{-- @endforeach --}}




{{-- @foreach($blogs as $post) --}}
{{-- <div class="panel-default">
        <div class="panel-heading blog-title">
            <div class="row text-center">
                <span class="text bold color-blue">{{ $post->title }}</span><br>
                -- <span class="minitext">{{ $post->created_at }}</span> --
            </div>

               <div class="blog-actions">
                    <a href="#" class="btn btn-blog active"><i class="fa fa-paperclip"></i></a>
                    <a href="#" class="btn btn-blog"><i class="fa fa-user"></i></a>
                    <a href="#" class="btn btn-blog"><i class="fa fa-search"></i></a>
                    <a href="#"><img alt="Image" class="image-index-blog" src="#"></a>
                </div>
                {{ str_limit($post->description,20) }}
                <div class="blog-actions">
                    <a href="#" class="minitext">read more</a>
                </div>
        </div>
</div> --}}
{{-- @endforeach --}}

        {{--@include('layout.forms._basic.default',['model' => 'ajax','method' => 'helper','type'=>''])--}}


{{--     <div class="helper">
        <span class="close"></span>
             <div class="logo"></div>
             <span>Sovpal.ru</span>
        <div class="header">
            <div class="number">5</div>
            <div class="icon"></div>
        </div>
        <div class="text">
            <div class="title">
                <span class="blue_c">Зафиксируйте</span><br>
                <span>договоренность</span>
            </div>
            <p class="details"></p>
        </div>
    </div> --}}
layout/flash
{{-- @if(Session::has('flash.dialog')) --}}
{{-- <div class="modal modal-{{Session::get('flash.style')}} fade" id="flash-overlay-modal" >
<div class="modal-dialog">
      <div class="modal-content">
          <div class="content text-center" ><h3>
            <img src="{{url('assets/images/landing/logo.png')}}" width="30px">
             <p>Sovpal.Ru</p>
            </h3></div>
          <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <i class="fa fa-{{Session::get('flash.icon')}}"></i>
                <h4><small>{{Session::get('flash.title')}}</small></h4>
                <p>{{Session::get('flash.message')}}</p>
          </div>
          <div class="modal-footer">
                 <button type="button" class="btn btn-{{Session::get('flash.style')}}" data-dismiss="modal">OK</button>
          </div>
      </div>
  </div>
</div> --}}
{{-- @endif --}}
{{--
@if(session()->has('flash'))
    @foreach (session()->get('flash') as $flash)
    @endforeach
@endif
 --}}
{{-- @foreach ($messages as $msg) --}}
{{--     <div class="alert alert-block alert-{{ $msg['type'] }} fade in">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p><strong>{{ $msg['message'] }}</strong></p>

        @if (!empty ($msg['details']))
            <p>{{ $msg['details'] }}</p>
        @endif

        @if (!empty ($msg['items']))
            <ul>
              @foreach ($msg['items'] as $item)
                <li>{{ $item }}</li>
              @endforeach
            </ul>
        @endif

        @if ( ! empty ($msg['buttons']))
            <p>
                @foreach ($msg['buttons'] as $btn)
                    <a class="btn btn-{{ $btn['class'] }}" href="{{ $btn['url'] }}">{{ $btn['text'] }}</a>
                @endforeach
            </p>
        @endif
    </div> --}}
{{-- @endforeach --}}
{{--
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#{{ $model.'_'.$method }}_modal').modal('show');
    @endif
</script> --}}
layout/head
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
{{-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'> --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> --}}
{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
{{-- etline-font ??? --}}
layout/header
     {{-- <span style="color:#e3e7eb">Sovpal</span> --}}
               		{{-- <li><a href="" class="white_c navbar-text">Already have an account?</a></li> --}}

    {{--       <div class="collapse_login navbar-collapse2 ">login index</div> --}}
one/footer
{{--     @if($data->checkAdd($currentUser) && $currentUser->id != $data->user_id)
        @include('layout.forms._basic.default',
       ['model' => 'action','method' => 'add','type'=>'modal','model_id'=>$data->id,'item'=>$data])

       <a type="button" class="col-md-4 btn btn-white btn-large" data-toggle="modal" data-target="#action_add_modal">
       {{ trans('sovpal.AddItem') }}<i class="fa fa-cart-plus fa-lg"></i></a>
    @else
    	<p class="col-md-4">{{ trans('sovpal.AlreadyAdd') }}</p>
    @endif --}}
    {{-- @include('layout.buttons.like') --}}