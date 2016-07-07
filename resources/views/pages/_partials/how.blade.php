<div id="container">
        <div class="text-center">
            <h2 class="size26">{{ trans('pages.how.title') }} <br>
            <small class="size14 text-center">{{trans('pages.how.message')}}</small></h2>
        </div>
        <div class="clearfix"></div>
    <section class="col-lg-offset-1 col-lg-10 size14" style="margin-bottom: 60px;">
        <div class="col-xs-4 text-center">
             <h1>15</h1>
            {{--<img src="{{ asset('assets/images/pages/how01.png') }}" width="100" height="100">--}}
             <div class="size14"> <h2 class="size16 red_c bold">{{ trans('pages.how.step1') }}</h2> {{ trans('pages.how.step1_extra') }} </div> </div>

        <div class="col-xs-4 text-center">
             <h1>125</h1>
            {{--<img src="{{ asset('assets/images/pages/how01.png') }}" width="100" height="100">--}}
            <div class="size14"> <h2 class="size16 red_c bold">{{ trans('pages.how.step2') }}</h2> {{ trans('pages.how.step2_extra') }} </div> </div>

        <div class="col-xs-4 text-center">
            <h1>45</h1>
            {{--<img src="{{ asset('assets/images/pages/how01.png') }}" width="100" height="100">--}}
             <div class="size14"> <h2 class="size16 red_c bold">{{ trans('pages.how.step3') }}</h2> {{ trans('pages.how.step3_extra') }} </div>
         </div>
    </section>
        <div class="clearfix"></div>
    <section class="button_field text-center">
        <a href="{{ route('auth.register') }}" class="btn blue_c"> {{trans('sovpal.forms.startNow')}}</a>
    </section>

    <section class="col-lg-offset-1 col-lg-10 col-md-12 col-xs-12">
            @for($number = 1; $number < 5; $number ++)
                            <div style="margin: 20px 0;">
                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin: 20px 0;">
                        <img class="icon_page img-responsive" src="{{ asset('assets/images/pages/how'.$number.'.png') }}">
                    </div>
                   <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <h4 class="bold size16">{{trans('pages.how.title'.$number) }}</h4>
                    <p>{{ trans('pages.how.description'.$number) }}</p>
                   </div>
                     <div class="clearfix"></div>
                  </div>
            @endfor
    </section>

    {{--<section class="page_mockup text-center">--}}
    {{--<div id="wrapper">--}}
        {{--<div class="frontPhone">--}}
            {{--<img width="602px" class="img-responsive" src="{{asset('assets/images/pages/macbook.png')}}">--}}
        {{--</div>--}}

        {{--<div id="slider-wrapper">--}}
            {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
                {{--<!-- Indicators -->--}}
                {{--<ol class="carousel-indicators">--}}
                    {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                    {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                    {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                {{--</ol>--}}

                {{--<!-- Wrapper for Slides -->--}}
                {{--<div class="carousel-inner" role="listbox">--}}
                    {{--<div class="item active">--}}
                        {{--<img src="img_chania.jpg" alt="Chania">--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<img src="img_chania.jpg" alt="Chania">--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<img src="img_chania.jpg" alt="Chania">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Controls -->--}}
                {{--<a class="left carousel-control" href="#myCarousel" role="button"  data-slide="prev">--}}
                    {{--<span class="fa fa-left" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Previous</span>--}}
                {{--</a>--}}
                {{--<a class="right carousel-control" href="#myCarousel" role="button"  data-slide="next">--}}
                    {{--<span class="fa fa-right" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Next</span>--}}
                {{--</a>--}}

            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
{{--</section>--}}

        {{--<div class="clearfix"></div>--}}


    <section class="col-lg-offset-1 col-lg-10 col-md-12 col-xs-12" >
            @for($number = 5; $number < 7; $number ++)
                <div style="margin: 20px 0;">
                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <img class="icon_page img-responsive" src="{{ asset('assets/images/pages/how'.$number.'.png') }}">
                    </div>
                   <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <h4 class="bold size16">{{trans('pages.how.title'.$number) }}</h4>
                    <p>{{ trans('pages.how.description'.$number) }}</p>
                   </div>
                   <div class="clearfix"></div>
                   </div>
            @endfor
    </section>


    <section class="button_field text-center">
        <a href="{{ route('auth.register') }}" class="btn blue_c">
        {{trans('sovpal.forms.startNow')}}</a>
    </section>
        <h3 class="size14 red_c text-center">{{trans('pages.how.message2')}}</h3>
</div>










