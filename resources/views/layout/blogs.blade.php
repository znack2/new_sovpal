
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

<div class="col-md-2 content_blog helpbox">
    <h4>{{ trans('sovpal.Help') }}</h4> 
        <p>
        @if($currentRoute == 'groups')
            {{ trans('sovpal.help.groups') }}
        @elseif($currentRoute == 'item')
            {{ trans('sovpal.help.item') }} 
        @elseif($currentRoute == 'users' && Request::input('type') == 'profis')
            {{ trans('sovpal.help.profis') }}   
        @elseif($currentRoute == 'users' && Request::input('type') == 'owners')
            {{ trans('sovpal.help.owners') }}   
        @elseif($currentRoute == 'users' && Request::input('type') == 'shops')
            {{ trans('sovpal.help.shops') }} 
        @elseif($currentRoute == 'items')
            {{ trans('sovpal.help.items') }} 
        @elseif($currentRoute == 'items' && Request::input('type') == 'tools')
            {{ trans('sovpal.help.tools') }} 
        @elseif($currentRoute == 'items' && Request::input('type') == 'materials')
            {{ trans('sovpal.help.materials') }} 
        @elseif($currentRoute == 'group')
            {{ trans('sovpal.help.group') }} 
        @elseif($currentRoute == 'profile')
            {{ trans('sovpal.help.profile') }} 
        @endif
        </p>

        <div class="clearfix"></div>
        {{--@include('layout.forms._basic.default',['model' => 'ajax','method' => 'helper','type'=>''])--}}
</div>

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
