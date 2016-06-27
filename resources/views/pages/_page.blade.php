@extends('layout.app')

@section('content')
    @if($page == 'landing')
        @include('pages.landing')
        <div id="landing_footer">
          @include('layout.big_footer')
        </div>
    @else
    <div id="page_background" style="max-width: 1200px;margin: 30px auto;">

        {{--<div class="row text-center">--}}
          {{--<h3 class="col-md-offset-2 col-md-8 size40 lh50 bold">{{ trans('sovpal.page'.$page) }}</h3>--}}
        {{--</div>--}}

        <div class="col-md-2 panel-default profile_offcanvas" id="offcanvas_profile">
            <nav class="hidden-xs hidden-sm nav-sidebar" id="large-menu">
                @include('pages.sidebar')
           </nav>
        </div>

        <div id="page" class="col-md-8 panel">
              <div class="panel-content">
                  <img src="{{ asset('assets/images/pages/'.$page) }}.jpg" class="img-responsive page_default">
                  @if($page == 'owners' || $page == 'shops' || $page == 'designers')
                    <div class="content">
                            <div class="section-heading text-center">
                                <h1>{{trans('pages.'.$page.'.title')}}</h1>
                                <div class="divider"></div>
                                <p>{{trans('pages.'.$page.'.message') }}</p>
                            </div>
                            <br>
                            <br>
                            <br>

                        <div class="col-md-offset-1 col-md-10 size14">
                              <div class="row">
                                    <div class="col-xs-offset-2 col-xs-8 col-md-offset-0 col-md-6">
                                        <h3 class="bold">
                                        <img src="{{ asset('assets/images/pages/'.$page.'1.png') }}" height="30px" width="30px%">
                                        {{trans('pages.'.$page.'.title1')}}</h3>
                                        <p>{{trans('pages.'.$page.'.description1')}}</p>
                                    </div>
                                    <div class="col-xs-offset-2 col-xs-8 col-md-offset-0 col-md-6">
                                        <h3 class="bold">
                                        <img src="{{ asset('assets/images/pages/'.$page.'2.png') }}" height="30px" width="30px">
                                            {{trans('pages.'.$page.'.title2')}}</h3>
                                        <p>{{trans('pages.'.$page.'.description2')}}</p>
                                    </div>
                                </div>


                                <div class="row" style="margin: 30px 0;">
                                   <img src="{{ asset('assets/images/pages/'.$page.'.png') }}" height="100%" width="100%">
                                </div>



                              <div class="row">
                                  <div class="col-xs-offset-2 col-xs-8 col-md-offset-3 col-md-6">
                                   <h3 class="bold">
                                   <img src="{{ asset('assets/images/pages/'.$page.'3.png') }}" height="30px" width="30px">
                                   {{trans('pages.'.$page.'.title3')}}</h3>
                                   <p>{{trans('pages.'.$page.'.description3')}}</p>
                                  </div>
                              </div>
                              <h3 class="size14 red_c text-center">{{trans('pages.'.$page.'.message2')}}</h3>
                        </div>
                     </div>
                  @elseif($page == 'contacts')
                    <div class="row text-center">
                        <div class="col-sm-12 text-center bottom-separator">
                            <h1>{{trans('pages.contacts.title')}}</h1>
                            <div class="divider"></div>
                            <p>{{trans('pages.contacts.message')}}</p>
                        </div>
                        <div class="col-xs-12">
                            <div class="testimonial bottom">
                                <div class="col-xs-6 ">
                                    <h3><a class="size14 blue_c" href="#">{{trans('pages.contacts.Minkowski')}}</a></h3>
                                    <img src="{{ asset('assets/images/pages/anton.jpg') }}" alt="">
                                    <div class="col-xs-12 media-body">
                                         <address>
                                                <span>{{ trans('pages.contacts.occupation1') }} </span> <br>
                                                {{ trans('pages.contacts.email') }}: <a href="mailto:info@sovpal.ru">info@sovpal.ru</a> <br>
                                                {{ trans('pages.contacts.phone') }}: +7 (916) 013 77 33 <br>
                                        </address>
                                    </div>
                                 </div>
                                <div class="col-xs-6 ">
                                    <h3><a class="size14 blue_c" href="">{{trans('pages.contacts.Shershneva')}}</a></h3>
                                    <img src="{{ asset('assets/images/pages/olya.jpg') }}" alt="">
                                    <div class="col-xs-12 media-body">
                                        <address>
                                                <span>{{ trans('pages.contacts.occupation2') }}</span> <br>
                                                {{ trans('pages.contacts.email') }}: <a href="mailto:info@sovpal.ru">info@sovpal.ru</a> <br>
                                                {{ trans('pages.contacts.phone') }}: +7 (916) 013 77 33 <br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-offset-2 col-xs-8">
                    <div class="contact-form bottom">
                        @include('layout.forms.ajax.contact',['modal_data'=>null])
                    </div>
                </div>
                    </div>
                  @elseif($page == 'privacy')
                  <div class="content">
                    <h2 class="text-center">{{trans('pages.privacy.title')}}</h2> <br>
                    <p class="size14 text-center">{{trans('pages.privacy.message')}}</p>
                          @for ($number = 0; $number < 8; $number++)
                            <div class="col-md-offset-1 col-md-10 size14">
                            <h3 class="row text-center"><div class="logo"></div></h3>
                                <h4 class="bold size16 text-center">{{ trans('pages.privacy.title'.$number) }}</h4>
                                <p>{{trans('pages.privacy.text'.$number)}}</p>
                            </div>
                          @endfor
                    </div>
                  @elseif($page == 'terms')
                   <div class="content">
                    <h2 class="text-center lh50">{{trans('pages.terms.title')}} <br>
                    <small class="size14 text-center">{{trans('pages.terms.message')}}</small></h2>
                         @for($number = 1; $number < 5; $number++)
                            <div class="col-md-offset-1 col-md-10 size14">
                                <h3 class="row text-center"><div class="logo"></div></h3>
                                <h4 class="bold size16 text-center">{{ trans('pages.terms.title'.$number) }}</h4>
                                <p><strong class="color_red">{{ trans('pages.terms.bold'.$number) }}</strong>{{ trans('pages.terms.text'.$number) }}</p>
                            </div>
                        @endfor
                    </div>
                  @else
                    @include('pages.'.$page)
                  @endif
              </div>
              @include('pages.footer')
        </div>
    </div>
    @endif
@endsection





