
<div class="content nopadding">
  <br>

  @if(Request::url() == route('groups') && $currentUser->type == 'owner')
      <div class="col-md-3 col-sm-3 hidden-xs pull-left">
          <li>
          <input class="css-checkbox" {{ (Request::input('limitBy') == 'close') ? 'checked' : '' }} id="close" type="checkbox" 
          onchange="window.location.href='{{ route(Request::route()->getName(), 
          ['type'=>Request::input('type'),
          'tag'=>Request::input('tag'),
          'element'=>Request::input('element'),
          'search'=>Request::input('search'),
          'sortBy'=>Request::input('sortBy'),
          'direction'=>Request::input('direction'),
          'limitBy'=>(Request::input('limitBy') == 'close') ? '' : 'close']) }}'">
          <label class="css-label dark-plus-cyan" for="close">{{ trans('sovpal.CloseToMe') }}</label></li>
      </div>
  @endif

  <div class="col-md-4 col-sm-4 col-xs-4 text-center">
        @if(count($data['items'])>1)
          <p><span class="hidden-xs">{{ trans('sovpal.Display') }}</span>
          <strong>{{($data['items']->currentpage()-1)*$data['items']->perpage()+1}}</strong>
          {{ trans('sovpal.to') }}
         <strong> {{$data['items']->currentpage()*$data['items']->perpage()}}</strong>
           {{ trans('sovpal.of') }}  
          <strong> {{$data['items']->total()}} </strong>
           </p>
         @endif
     </div>

  <div class="col-md-5 col-sm-5 col-xs-7 menu_filter pull-right">
      <div class="filter_item pull-right {{ Request::input('sortBy') == 'level' ||  Request::input('sortBy') == 'created_at' ? 'active': '' }}">
          <a class="link" href="{{ route(Request::route()->getName(),
                ['type'=>Request::input('type'),
                 'tag'=>Request::input('tag'),
                 'element'=>Request::input('element'),
                 'search'=>Request::input('search'),
                 'sortBy'=>Request::url() == route('users') ? 'level' : 'created_at',
                 'direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc' ]) }}">
              <span>{{ trans('sovpal.'.Request::url() == route('users') ? 'level' : 'date') }}</span></a>
            <i class="fa fa-arrow-{{ Request::input('sortBy') == 'created_at' && Request::input('direction') == 'desc' ? 'down'  : 'up'}}"></i>
      </div>

      <div class="filter_item pull-right {{ Request::input('sortBy') == 'default_price' ||  Request::input('sortBy') == 'hour_cost' ||  Request::input('sortBy') == 'first_name'? 'active': '' }}">
            <a class="link" href="{{ route(Request::route()->getName(),
             ['type'=>Request::input('type'),
             'tag'=>Request::input('tag'), 
             'element'=>Request::input('element'),
             'search'=>Request::input('search'),
             'sortBy'=> functionExtra(Request::url(),Request::input('type')),
             'direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc']) }}">
            <span>{{ trans('sovpal.price/cost/name') }}</span>
            <i class="fa fa-arrow-{{ Request::input('sortBy') == 'default_price' || Request::input('sortBy') == 'price' || Request::input('sortBy') == 'hour_cost' && Request::input('direction') == 'desc' ? 'down'  : 'up'}}"></i>
          </a>
      </div>

      <div class="hidden-xs filter_item pull-right ">
         <a id="details-list" class="link"><i class="fa fa-list"></i></a>
      </div>

      <div class="hidden-xs filter_item pull-right ">
         <a id="thumbnails-list" class="link"> <i class="fa fa-th"></i></a>
      </div>

  </div>

  <br>
</div>



