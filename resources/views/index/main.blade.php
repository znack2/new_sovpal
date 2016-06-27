@extends('layout.app')

@section('content')

    @include('index.sidebar')

    <div class="col-xs-12 col-sm-12 col-md-8 panel">

            <div class="hidden-xs col-sm-12 col-md-12 nopadding">
              @include('index.menu')
            </div>

            <div class="clearfix"></div>

            <div class="banner_content">
                 @include('layout.forms.ajax.search_index')
                 @include('index.sort')
            </div>

				    <ul id="listdisplay" class="col-md-12 clearfix">

                          @forelse ($data['items'] as $item)
                            @include('index.one_item')
                          @empty
                              <li class="empty_result text-center">
                                  @include('layout.forms._basic.default', ['model' => 'ajax','method' => 'empty_index','type'=>null,'modal_data'=>null])
                              </li>
                              <li class="empty_result text-center">
                                  <div class="col-md-12">
                                        @foreach($last_items as $item)
                                            <div class="col-md-4">
                                              <h3 class="text-center">{{ $item->title }}</h3>
                                              <img src="{{ asset('assets/images/items/'.$item->images->get(['url']).'.'.$item->images->get(['file'])) }}" class="img-responsive">
                                            </div>
                                        @endforeach
                                    </div>
                              </li>
                          @endforelse

            <div class="col-md-offset-3 col-md-6 text-center">
                @if(count($data['items'])>1)
                        @include('layout.pagination',['paginator' => $data['items']->appends(
                        ['direction'=>Request::input('direction'),
                        'sortBy'=>Request::input('sortBy'),
                        'search'=>Request::input('search'),
                        'limitBy'=>Request::input('limitBy'),
                        'tag'=>Request::input('tag'),
                        'element'=>Request::input('element'),
                        'type'=>Request::input('type')])])
                @endif
            </div>

		        </ul>
            <div class="clearfix"></div>
        @include('layout.big_footer')
    </div>

  <div class="hidden-sm hidden-xs col-md-2">
      @include('layout.blogs')
  </div>

@endsection


