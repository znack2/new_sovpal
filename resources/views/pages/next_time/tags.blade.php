<div class="container-fluid row home_list">
     @foreach($tags as $category_type => $category)
          <div class="row">
            <div class="col-md-offset-2 col-md-6">
                <ul class="pull-left list-inline">
                  <li><p class="dark_grey bold size20">{{ ucfirst($category_type) }}  : </p></li><br>
                  @foreach($category->take(10) as $tag)
                    <li><a href="{{ route('items',['type'=>Request::input('type'),'tag' => $tag->image]) }}" class="size16">
                    {{ ucfirst($tag->name) }}</a></li>
                  @endforeach

                  <li><a href="{{ route('pages',['page'=>'tags']) }}" class="size16">{{ trans('sovpal.more') }}...</a></li>
                  <hr>
                </ul>
            </div>
          </div>

          <div class="container-fluid row">
            <div class="col-md-offset-2 col-md-8 text-center">
              @if($category_type == 'brands')
                    @include('layout.last.items')
              @endif
              @if($category_type == 'types')
                    @include('layout.last.items')
              @endif
              @if($category_type == 'categories')
                    @include('layout.last.items')
              @endif
              @if($category_type == 'room')
                    @include('layout.last.items')
              @endif
            </div>
          </div>

     @endforeach
</div>