<div class="col-md-2 sidebar_offcanvas" id="offcanvas_sidebar">
    <nav class="hidden-xs hidden-sm nav-sidebar" id="large-menu">
      <ul class="nav sidebar-nav">

        @if(Request::url() == route('items') || Request::url() == route('users',['type'=>'shops']))
            <i class="visible-sm fa fa-home"></i>
            <h4>{{ trans('sovpal.'.Request::has('type') ? Request::input('type') : trans('sovpal.Rooms')) }}</h4>
            @foreach($tag_categories as $tag_category)
              <li class="dropdown">
                 <a class="link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     <img src="{{ asset('assets/images/tags/'.$tag_category->images->first()->url.'.'.$tag_category->images->first()->file) }}" width="15" height="15">
                     <span class="bold sidebar_text">{{ trans('tags.'.$tag_category->name) }}</span>
                     <span class="pull-right caret"></span>
                 </a>
                 <ul class="dropdown-menu" role="menu">
                   @foreach($tag_category->elements as $tag)

                       <li>
                         <a class="link" href="{{ route(Request::route()->getName(), ['type'=>Request::input('type'),'element'=>$tag->name, 'search'=>Request::input('search'),'sortBy'=>Request::input('sortBy'),'direction' =>Request::input('direction')]) }}">
                         <img src="{{ asset('assets/images/elements/'.$tag->images->first()->url.'.'.$tag->images->first()->file) }}" width="15" height="15">

                         <span class="sidebar_text">{{ trans('tags.'.$tag->name) }}</span>
                         <span class="pull-right badge">{{ $tag->item_count}}</span>
                         </a>
                       </li>

                     @endforeach
                 </ul>
              </li>
            @endforeach





        @elseif(Request::url() == route('users',['type'=>'profis']))
            <i class="visible-sm fa fa-home"></i>
            <h4>{{ trans('sovpal.Skills') }}</h4>
            @foreach($tagskills as $skill)
              <li>
                 <a class="link"  href="{{ route(Request::route()->getName(), ['type'=>Request::input('type'),'skill'=>$skill->name,
                 'search'=>Request::input('search'),'sortBy'=>Request::input('sortBy'),'direction'=>Request::input('direction')]) }}">
                     <img src="{{ asset('assets/images/tags/skill/'.$skill->images->first()->url.'.'.$skill->images->first()->file) }}" width="15" height="15">
                     <span class="bold sidebar_text">{{ trans('tags.'.$skill->name) }}</span>
                     <span class="pull-right badge">{{ $skill->profi_count}}</span>
                 </a>
              </li>
            @endforeach
        @elseif(Request::url() == route('users',['type'=>'owners']))
          @foreach(['own_remont','with_designer'] as $selection)
              <li class="sidebar_filter">
                  <input class="css-checkbox" {{ (Request::input('limitBy') == $selection) ? 'checked' : '' }} id="{{$selection}}" type="checkbox"
                  onchange="window.location.href='{{ route(Request::route()->getName(),
                  ['type'=>Request::input('type'),
                  'tag'=>Request::input('tag'),
                  'element'=>Request::input('element'),
                  'search'=>Request::input('search'),
                  'sortBy'=>Request::input('sortBy'),
                  'direction'=>Request::input('direction'),
                  'limitBy'=>(Request::input('limitBy') == $selection) ? '' : $selection]) }}'">
                  <label class="css-label dark-plus-cyan" for="{{$selection}}">{{ trans('sovpal.'.$selection) }}</label>
              </li>
          @endforeach




        @elseif(Request::url() == route('groups'))
            <i class="visible-sm fa fa-home"></i>
            <h4>{{ trans('sovpal.Categories') }}</h4>
            @foreach($tagcategories as $category)
              <li>
                 <a class="link"  href="{{ route(Request::route()->getName(), ['type'=>Request::input('type'),'category'=>$category->name,
                 'search'=>Request::input('search'),'sortBy'=>Request::input('sortBy'),'direction'=>Request::input('direction')]) }}">
                     <img src="{{ asset('assets/images/tags/category/'.$category->images->first()->url.'.'.$category->images->first()->file) }}" width="15" height="15">
                     <span class="bold sidebar_text">{{ trans('tags.'.$category->name) }}</span>
                     <span class="pull-right badge">{{ $category->item_count}}</span>
                 </a>
              </li>
            @endforeach
            <hr>
            @foreach(['today_expire','soon_expire','no_expire'] as $expire_selection)
              <li class="sidebar_filter">
                      <input class="css-checkbox" {{ (Request::input('limitBy') == $expire_selection) ? 'checked' : '' }} id="{{$expire_selection}}" type="checkbox"
                      onchange="window.location.href='{{ route(Request::route()->getName(),
                      ['type'=>Request::input('type'),
                      'tag'=>Request::input('tag'),
                      'element'=>Request::input('element'),
                      'search'=>Request::input('search'),
                      'sortBy'=>Request::input('sortBy'),
                      'direction'=>Request::input('direction'),
                      'limitBy'=>(Request::input('limitBy') == $expire_selection) ? '' : $expire_selection]) }}'">
                      <label class="css-label dark-plus-cyan" for="{{$expire_selection}}">{{ trans('sovpal.'.$expire_selection) }}</label>
                  </li>
            @endforeach
        @endif




        <hr>
            <li class="sidebar_filter">
               <input class="css-checkbox" {{ (Request::input('limitBy') == 'premium') ? 'checked' : '' }} id="premium" type="checkbox"
               onchange="window.location.href='{{ route(Request::route()->getName(),
               ['type'=>Request::input('type'),
               'tag'=>Request::input('tag'),
               'element'=>Request::input('element'),
               'search'=>Request::input('search'),
               'sortBy'=>Request::input('sortBy'),
               'direction'=>Request::input('direction'),
               'limitBy'=>(Request::input('limitBy') == 'premium') ? '' : 'premium']) }}'">
               <label class="css-label dark-plus-cyan" for="premium">{{ trans('sovpal.Premium') }}</label>
            </li>
        <hr>
    </ul>
    </nav>
</ul>
</div>

