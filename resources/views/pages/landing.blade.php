    <style> body{ background-color: #fff; } </style>

    <div class="wrapper">

        <!--features-->
        <section id="features">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>{{ trans('pages.landing.pagefeatures') }}</h1>
                    <div class="divider"></div>
                    <p>{{ trans('pages.landing.pagefeatures_description') }}</p>
                </div>
                 <div class="visible-xs row text-center white_c"><a href="#"><i class="down_arrow fa fa-angle-down fa-lg"></i></a></div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 scrollpoint sp-effect1">
                        <div class="media feature">
                            <p class="pull-right"> <i class="fa fa-cogs fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature1') }}</h3>{{ trans('pages.landing.feature1_description') }}
                            </div>
                        </div>
                        <div class="media feature">
                            <p class="pull-right"> <i class="fa fa-envelope fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature2') }}</h3>{{ trans('pages.landing.feature2_description') }}
                            </div>
                        </div>
                        <div class="media feature">
                            <p class="pull-right"> <i class="fa fa-users fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature3') }}</h3>{{ trans('pages.landing.feature3_description') }}
                            </div>
                        </div>
                        <div class="media feature">
                            <p class="pull-right"> <i class="fa fa-comments fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature4') }}</h3>{{ trans('pages.landing.feature4_description') }}
                            </div>
                        </div>
                        <div class="media feature">
                            <p class="pull-right"> <i class="fa fa-calendar fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature5') }}</h3>{{ trans('pages.landing.feature5_description') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" >
                        <img src="{{ asset('assets/images/freeze/house.png')}}" class="img-responsive scrollpoint sp-effect5" alt="" style="height: 400px;">
                    </div>
                    <div class="col-md-4 col-sm-4 scrollpoint sp-effect2">
                        <div class="media feature">
                            <p class="pull-left"> <i class="fa fa-map-marker fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature6') }}</h3> {{ trans('pages.landing.feature6_description') }}
                            </div>
                        </div>
                        <div class="media feature">
                            <p class="pull-left"> <i class="fa fa-film fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature7') }}</h3> {{ trans('pages.landing.feature7_description') }}
                            </div>
                        </div>
                        <div class="media feature">
                            <p class="pull-left"> <i class="fa fa-compass fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature8') }}</h3> {{ trans('pages.landing.feature8_description') }}
                            </div>
                        </div>
                        <div class="media feature">
                            <p class="pull-left"> <i class="fa fa-picture-o fa-2x"></i> </p>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.feature9') }}</h3> {{ trans('pages.landing.feature9_description') }}
                            </div>
                        </div>
                        <div class="media active feature">
                            <a href="#getApp" class="pull-left"> <i class="fa fa-plus fa-2x"></i> </a>
                            <div class="media-body">
                                <h3 class="media-heading">{{ trans('pages.landing.otherfeatures') }}</h3> {{ trans('pages.landing.otherfeatures_description') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="owners">
             <div class="container scrollpoint sp-effect3">
                <div class="col-xs-12 col-md-6  section-heading">
                    <img src="{{ asset('assets/images/freeze/owner3.png') }}" width="300px" height="300px">
                </div>
                <div class="col-xs-12 col-md-6 section-heading inverse">
                    <h1 class="bold">
                    {{--<img src="{{ asset('assets/images/freeze/owner.png') }}"  width="25px" height="25px">--}}
                        {{trans('pages.landing.owner')}}</h1><br><br><br>
                    <p>{{trans('pages.landing.owner_description')}}</p>
                    <a class="btn btn-lg btn-primary inverse " href="{{ route('pages',['page'=>'owners']) }}">{{ trans('pages.landing.findMore') }}</a>
                </div>
            </div>
        </section>

        <section id="shops">
             <div class="container scrollpoint sp-effect3">
                <div class="col-xs-12 col-md-push-6 col-md-6 section-heading">
                     <img src="{{ asset('assets/images/freeze/shop3.png') }}" width="300px" height="300px">
                 </div>
                 <div class="col-xs-12 col-md-pull-6 col-md-6 section-heading inverse ">
                     <h1 class="bold">
                     {{--<img src="{{ asset('assets/images/freeze/shop2.png') }}" width="25px" height="25px">--}}
                       {{trans('pages.landing.shop')}}</h1><br><br><br>
                   <p>{{trans('pages.landing.shop_description')}}</p>
                    <a class="btn btn-lg btn-primary inverse" href="{{ route('pages',['page'=>'shops']) }}">{{ trans('pages.landing.findMore') }}</a>
                 </div>
            </div>
        </section>

        <section id="designers">
             <div class="container scrollpoint sp-effect3">
                <div class="col-xs-12 col-md-6  section-heading">
                    <img src="{{ asset('assets/images/freeze/designer3.png') }}" width="300px" height="300px">
                </div>
                <div class="col-xs-12 col-md-6 section-heading inverse">
                    <h1 class="bold">
                    {{--<img src="{{ asset('assets/images/freeze/designer.png') }}" width="25px" height="25px">--}}
                    {{trans('pages.landing.designer')}}</h1><br><br><br>
                    <p>{{trans('pages.landing.designer_description')}}</p>
                     <a class="btn btn-lg btn-primary inverse" href="{{ route('pages',['page'=>'designers']) }}">{{ trans('pages.landing.findMore') }}</a>
                </div>
            </div>
        </section>

        <section id="getApp">
            <div class="container-fluid inverse">
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <h1>{{ trans('sovpal.SignUp') }}</h1>
                    <div class="divider"></div>
                    <p> {{ trans('pages.landing.title4')  }}</p>
                </div>

                <div class="row">
                    <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                     @include('layout.forms._basic.default',['model' => 'auth','method' => 'register','type'=>'','modal_data'=>null])
                    </div>
                </div>
            </div>
        </section>
    </div>
@section('scripts')
<script type="text/javascript" src="{{asset('assets/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/placeholdem.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>

<script>
$(document).ready(function() {
    appMaster.preLoader();
    $(".about_trigger").click(function(){
        $("#about").slideToggle("slow");
     });
     $('.btn_submit').click(function(){
        $('#flash_message').show();
     });
});
</script>
@stop



