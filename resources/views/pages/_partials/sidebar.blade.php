
<div class="page_menu list-group">
  <h3 class="list-group-item ">{{ trans('sovpal.AboutService') }}</h3>

@foreach($pages=['owners','shops','designers'] as $page)
    <a class="size14 list-group-item {{ Request::url() == route('pages',['type'=>$page]) ? 'active': '' }}"
        href="{{ route('pages',['type'=>$page]) }}">{{ trans('sovpal.page'.$page) }}
        @if(Request::url() == route('pages',['type'=>$page]))
            <i class="pull-right fa fa-arrow-right fa-lg"></i>
        @endif
    </a>
@endforeach

  <h3 class="list-group-item ">{{ trans('sovpal.UseSovpal') }}</h3>

  @foreach($pages=['how','faq'] as $page)
      <a class="size14 list-group-item {{ Request::url() == route('pages',['type'=>$page]) ? 'active': '' }}"
          href="{{ route('pages',['type'=>$page]) }}">{{ trans('sovpal.page'.$page) }}
          @if(Request::url() == route('pages',['type'=>$page]))
              <i class="pull-right fa fa-arrow-right fa-lg"></i>
          @endif
      </a>
  @endforeach

  <h3 class="list-group-item ">{{ trans('sovpal.Extras') }}</h3>

  @foreach($pages=['terms','privacy','contacts'] as $page)
      <a class="size14 list-group-item {{ Request::url() == route('pages',['type'=>$page]) ? 'active': '' }}"
          href="{{ route('pages',['type'=>$page]) }}">{{ trans('sovpal.page'.$page) }}
          @if(Request::url() == route('pages',['type'=>$page]))
              <i class="pull-right fa fa-arrow-right fa-lg"></i>
          @endif
      </a>
  @endforeach
</div>