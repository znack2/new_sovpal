@include('pages.howworks')

<div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>



            <!-- SLIDE 0 -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                <img src="{{ asset('assets/images/transparent.png') }}"  alt="slidebg1"  data-bgfit="cover"
                data-bgposition="left top" data-bgrepeat="no-repeat">

                 <div class="tp-caption large_white_bold sft" data-x="center" data-y="center" data-hoffset="0"
                    data-voffset="-150" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                        <br> <br>
                        <h3 class="col-xs-12 text-center">
                            <div class="col-sm-3 col-xs-12">
                                <img src="{{ asset('assets/images/logo/logo_white.png') }}" class="img-responsive" style="margin: 0 auto;">
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <span class="white_c landing_title">{{ trans('pages.landing.title0_2')  }}</span>
                                <p style="margin-left: 30px;line-height: 30px;" class="white_c size26">{{ trans('pages.landing.title0')  }}</p>
                            </div>
                        </h3>
                        <div class="clearfix"></div>
                    </div>

                <br>
            </li>



            <!-- SLIDE 1 -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                <img src="{{ asset('assets/images/transparent.png') }}"  alt="slidebg1"  data-bgfit="cover"
                data-bgposition="left top" data-bgrepeat="no-repeat">


                <div class="tp-caption lfl fadeout visible-md visible-lg" data-x="left" data-y="bottom" data-hoffset="30"
                data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.3;
                scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                    data-voffset="-155" data-speed="500" data-start="700" data-easing="Power4.easeOut">
                    <img src="{{ asset('assets/images/freeze/Slides/hand-freeze.png') }}" alt="">
                </div>
                <div class="tp-caption lfl fadeout visible-sm" data-x="left" data-y="bottom" data-hoffset="30"
                    data-voffset="30" data-speed="500" data-start="700" data-easing="Power4.easeOut">
                    <img src="{{ asset('assets/images/freeze/Slides/hand-freeze.png') }}" alt="">
                </div>
                <div class="tp-caption lfl fadeout visible-xs" data-x="left" data-y="center" data-hoffset="700"
                    data-voffset="0" data-speed="500" data-start="700" data-easing="Power4.easeOut">
                    <img src="{{ asset('assets/images/freeze/iphone-freeze.png') }}" alt="">
                </div>


                <div class="tp-caption large_white_bold sft" data-x="550" data-y="center" data-hoffset="0"
                data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                    {{ trans('pages.landing.title2')  }}
                </div>
                <br>
                <div class="tp-caption sfb hidden-xs" data-x="550" data-y="center" data-hoffset="0"
                data-voffset="85" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                    <button type="button" data-toggle="modal" data-target="#howworks" class="btn btn-primary inverse btn-lg upper">{{ trans('sovpal.pagehow') }}</button>
                </div>
                <div class="tp-caption sfr hidden-xs" data-x="730" data-y="center" data-hoffset="0"
                data-voffset="85" data-speed="1500" data-start="1900" data-easing="Power4.easeOut">
                    <a href="#getApp" class="btn btn-default btn-lg">{{ trans('sovpal.SignUp') }}</a>
                </div>

                <div class="tp-caption sfb col-xs-12 visible-xs" data-x="center" data-y="center" data-hoffset="520"
                data-voffset="80" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                    <button type="button" data-toggle="modal" data-target="#howworks" class="btn btn-primary inverse btn-lg upper landing_button">{{ trans('sovpal.pagehow') }}</button>
                </div>
            </li>




            <!-- SLIDE 2 -->
            <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                <img src="{{ asset('assets/images/transparent.png') }}"  alt="slidebg1"  data-bgfit="cover"
                data-bgposition="left top" data-bgrepeat="no-repeat">

                <div class="tp-caption lfb fadeout visible-md visible-lg" data-x="center" data-y="bottom" data-hoffset="0"
                    data-voffset="-155" data-speed="1000" data-start="700" data-easing="Power4.easeOut">
                    <img src="{{ asset('assets/images/freeze/Slides/freeze-slide2.png') }}" alt="">
                </div>
                <div class="tp-caption lfb fadeout visible-sm" data-x="center" data-y="bottom" data-hoffset="0"
                    data-voffset="30" data-speed="1000" data-start="700" data-easing="Power4.easeOut">
                    <img src="{{ asset('assets/images/freeze/Slides/freeze-slide2.png') }}" alt="">
                </div>


                <div class="tp-caption large_white_light sft visible-md" data-x="center" data-y="center" data-hoffset="0"
                data-voffset="0" data-speed="1000" data-start="1400" data-easing="Power4.easeOut">
                    {{trans('pages.landing.title')}}
                </div>
                <div class="tp-caption sfb visible-md" data-x="150" data-y="center" data-hoffset="0"
                data-voffset="200" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                 <h4 class="tp-caption small_light_white text-center">{{ trans('pages.landing.title4') }}</h4>
                    <button type="button" data-toggle="modal" data-target="#howworks" class="btn btn-primary inverse btn-lg upper">{{ trans('sovpal.pagehow') }}</button>
                </div>


                <div class="tp-caption large_white_light sft hidden-md" data-x="center" data-y="center" data-hoffset="0"
                data-voffset="-300" data-speed="1000" data-start="1400" data-easing="Power4.easeOut">
                    <span>{{ trans('pages.landing.title3')  }}</span>
                </div>
                  <div class="tp-caption sfb col-xs-12 visible-xs" data-x="center" data-y="center" data-hoffset="300"
                    data-voffset="-50" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                     <button type="button" data-toggle="modal" data-target="#howworks" class="btn btn-primary inverse btn-lg upper landing_button">{{ trans('sovpal.pagehow') }}</button>
                    </div>
            </li>




            <!-- SLIDE 3 -->
            <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                <img src="{{ asset('assets/images/transparent.png') }}"  alt="slidebg1"  data-bgfit="cover"
                data-bgposition="left top" data-bgrepeat="no-repeat">

                <div class="tp-caption customin customout visible-md" data-x="right" data-y="center" data-hoffset="0"
                    data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;
                    skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;
                skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                    data-voffset="50" data-speed="1000" data-start="700" data-easing="Power4.easeOut">
                    <img src="{{ asset('assets/images/freeze/Slides/freeze.png') }}" alt="">
                </div>

                <div class="tp-caption customin customout hidden-md" data-x="center" data-y="center" data-hoffset="0"
                    data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;
                    skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;
                skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                    data-voffset="0" data-speed="1000" data-start="700" data-easing="Power4.easeOut">
                    <img src="{{ asset('assets/images/freeze/Slides/freeze.png') }}" alt="">
                </div>



                <div class="tp-caption large_white_light sfl hidden-md" data-x="center" data-y="center"
                data-hoffset="0" data-voffset="-400" data-speed="1000" data-start="1000" data-easing="Power4.easeOut">
                   {{trans('pages.landing.title')}}
                </div>

                <div class="tp-caption large_white_light sfl visible-md" data-x="-100" data-y="center"
                data-hoffset="0" data-voffset="-50" data-speed="1000" data-start="1000" data-easing="Power4.easeOut">
                   {{trans('pages.landing.title')}}
                </div>
                <div class="tp-caption small_light_white sfb visible-md" data-x="-100" data-y="center"
                data-hoffset="0" data-voffset="20" data-speed="1000" data-start="1600" data-easing="Power4.easeOut">
                   <p>{{ trans('pages.landing.title5')  }}</p>
                </div>

                  <div class="tp-caption sfb hidden-xs" data-x="center" data-y="center" data-hoffset="0"
                data-voffset="250" data-speed="1000" data-start="1800" data-easing="Power4.easeOut">
                    <button type="button" data-toggle="modal" data-target="#howworks" class="btn btn-primary inverse btn-lg upper">{{ trans('sovpal.pagehow') }}</button>
                </div>

                <div class="tp-caption sfb col-xs-12 visible-xs" data-x="center" data-y="center" data-hoffset="300"
                data-voffset="300" data-speed="1000" data-start="1800" data-easing="Power4.easeOut">
                    <button type="button" data-toggle="modal" data-target="#howworks" class="btn btn-primary inverse btn-lg upper landing_button">{{ trans('sovpal.pagehow') }}</button>
                </div>
            </li>

        </ul>


            <div class="row text-center" style="width:100%;position: absolute;z-index: 99;bottom: 0px;margin:0;">
                <div class="col-xs-12" id="landing_search_form">
                    <h3 class="hidden-xs size18">{{ trans('pages.landing.title5') }}</h3>
                        <div class="hidden-xs search_form">
                            @include('layout.forms.ajax.search_user',['modal_data'=>null])<br>
                        </div>
                        <div class="visible-xs col-xs-offset-1 col-xs-10">
                            <div class="logo"></div>
                            <h3 class="logo_text">{{ trans('sovpal.Sovpal') }}</h3>
                            @include('layout.forms._basic.default',['model' => 'auth','method' => 'login','type'=>null,'modal_data'=>null])
                        </div>
                    <div id="message" class="text-center" style="display: none;">
                        <h3 id="text"></h3>
                        <ul id="users" class="col-md-12 list-inline"></ul>
                        <button id="back" class="btn">back</button>
                        <a href="{{ route('auth.register') }}" class="btn">{{ trans('sovpal.registration') }}</a>
                    </div>
                </div>
            </div>

           

    </div>
</div>










