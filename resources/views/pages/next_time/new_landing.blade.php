
<script src="js/jquery.wmuSlider.js"></script> 
<script> $('.example1').wmuSlider();</script> 

<script type="text/javascript">
      jQuery(document).ready(function($) {
            $(".scroll").click(function(event){       
                  event.preventDefault();
                  $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
      });
</script>




<div class="header">
     <div class="container">
             <div class="logo">
                  <a href="index.html"><img src="images/logo.png" class="img-responsive" alt=""/></a>
             </div>
             <nav class="top-nav">
                        <ul class="top-nav">
                              <li class="active"><a href="#home" class="scroll">Home <span> </span></a></li>
                              <li class="page-scroll"><a href="#section1" class="scroll">{{ trans('') }}<span> </span></a></li>
                              <li class="page-scroll"><a href="#section2" class="scroll">{{ trans('') }}<span> </span></a></li>
                              <li class="page-scroll"><a href="#section3" class="scroll">{{ trans('') }}<span> </span></a></li>
                              <li class="page-scroll"><a href="#section4" class="scroll">{{ trans('') }}<span> </span></a></li>
                              <li class="page-scroll"><a href="#section5" class="scroll">{{ trans('') }}<span> </span></a></li>
                              <li class="contatct-active" class="page-scroll"><a href="#section6" class="scroll">{{ trans('') }}</a></li>
                        </ul>
                        <a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
                  </nav>                  
            <div class="clearfix"></div>
        </div>
   </div>

<div class="slider" id="home">

        <div class="slider_container">
            <div class="wmuSlider example1">
                     <div class="wmuSliderWrapper">
                               @for($1,$i>5,$i++)
                                 <article style="position: absolute; width: 100%; opacity: 0;"> 
                                     <div class="banner-wrap">
                                           <div class="slider-left">
                                              <h1>{{ trans('sovpal.landing.slidertitle'.$i)}}<br> & Sharp</h1>
                                                <p class="top">{{ trans('sovpal.landing.slidermessage'.$i)}}</p>
                                                 <ul class="button">
                                                      <li><a class="btn btn-white" href="{{ route() }}">{{ trans('sovpal.landing.sliderbutton1')}}</a></li>
                                                      <li><a class="btn btn-white" href="{{ route() }}">{{ trans('sovpal.landing.sliderbutton2')}}</a></li>
                                                </ul>
                                           </div>
                                           <div class="slider-right">
                                                 <img src="{{ asset('assets/images/landing/slider'.$i) }}" alt=""/> 
                                           </div>
                                           <div class="clearfix"></div>
                                     </div>
                                    </article>
                              @endfor
                        </div>
                      <ul class="wmuSliderPagination">
                              <li><a href="#">0</a></li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                     </ul>
              </div>
                  
           </div>
  </div>


<div class="main">
      <div class="content-top">
      	<div class="container">
      		<h2 class="m_1">{{ trans('sovpal.landing.title1') }}</h2>
      		<p class="m_2">{{ trans('sovpal.landing.message1') }}</p>

                   <!-- row of icons -->

      		<ul class="icons">
      			<li><a href="#"><i class="icon1"> </i></a></li>
      			<li><a href="#"><i class="icon2"> </i></a></li>
      			<li><a href="#"><i class="icon3"> </i></a></li>
      			<li><a href="#"><i class="icon4"> </i></a></li>
      			<li><a href="#"><i class="icon5"> </i></a></li>
      			<li><a href="#"><i class="icon6"> </i></a></li>
      			<div class="clearfix"> </div>
      		</ul>

 <!-- features image right-->

                  <div class="row feature" id="section1">
                        <h3 class="m_4">Feature</h3>
                        <div class="col-md-8 feature_top">
                              <h3><img src="{{ asset('assets/images/icons/landingicon2') }}">{{ trans('sovpal.landing.title2') }}</h3>
                              <p>{{ trans('sovpal.landing.message2') }}</p>
                              <div class="btn btn-white"><a href="{{ route('') }}">{{ trans('sovpal.landing.button6') }}</a></div><!--  go to owners -->
                        </div>
                        <div class="col-md-4 feature_img">
                              <img src="{{ asset('assets/images/icons/landing2') }}" class="img-responsive" alt="" width=200" height="200"/>
                        </div>
                  </div>

 <!-- features image left-->

                  <div class="row feature greyback" id="section2">
                        <div class="col-md-4 feature_img">
                              <img src="{{ asset('assets/images/icons/landing3') }}" class="img-responsive" alt="" width=200" height="200"/>
                        </div>
                        <div class="col-md-8 feature_top">
                              <h3 class="m_4">Feature</h3>
                              <h3><img src="{{ asset('assets/images/icons/landingicon3') }}">{{ trans('sovpal.landing.title3') }}</h3>
                              <p>{{ trans('sovpal.landing.message3') }}</p>
                              <div class="btn btn-white"><a href="{{ route() }}">{{ trans('sovpal.landing.button6') }}</a></div><!--  go to owners -->

                        </div>
                  </div>

 <!-- features image right-->

                  <div class="row feature" id="section3">
                        <h3 class="m_4">Feature</h3>
                        <div class="col-md-8 feature_top">
                              <h3><img src="{{ asset('assets/images/icons/landingicon4') }}">{{ trans('sovpal.landing.title4') }}</h3>
                              <p>{{ trans('sovpal.landing.message4') }}</p>
                              <div class="btn btn-white"><a href="{{ route() }}">{{ trans('sovpal.landing.button6') }}</a></div><!--  go to owners -->
                        </div>
                        <div class="col-md-4 feature_img">
                              <img src="{{ asset('assets/images/icons/landing4') }}" class="img-responsive" alt="" width=200" height="200"/>
                        </div>
                  </div>

 <!-- features image left-->

                  <div class="row feature greyback" id="section4">
                        <div class="col-md-4 feature_img">
                              <img src="{{ asset('assets/images/icons/landing5') }}" class="img-responsive" alt="" width=200" height="200"/>
                        </div>
                        <div class="col-md-8 feature_top">
                               <h3 class="m_4">Feature</h3>
                              <h3><img src="{{ asset('assets/images/icons/landingicon5') }}">{{ trans('sovpal.landing.title5') }}</h3>
                              <p>{{ trans('sovpal.landing.message5') }}</p>
                              <div class="btn btn-white"><a href="{{ route() }}">{{ trans('sovpal.landing.button6') }}</a></div><!--  go to owners -->
                        </div>
                  </div>

 <!-- features image right-->

      		<div class="row feature" id="section5">
      			<h3 class="m_4">Feature</h3>
      			<div class="col-md-8 feature_top">
      				<h3><img src="{{ asset('assets/images/icons/landingicon6') }}">{{ trans('sovpal.landing.title6') }}</h3>
      				<p>{{ trans('sovpal.landing.message6') }}</p>
              <div class="btn btn-white"><a href="{{ route() }}">{{ trans('sovpal.landing.button6') }}</a></div><!--  go to owners -->
      			</div>
      			<div class="col-md-4 feature_img">
      				<img src="{{ asset('assets/images/icons/landing6') }}" class="img-responsive" alt="" width="200" height="200"/>
      			</div>
      		</div>

      	</div>
      </div>
</div>


{{--slider--}}



<style>
.carousel {
  margin-bottom: 60px;
}
.carousel-control {
  top: 76%;
}
.carousel-caption {
  z-index: 10;
}
.carousel .item {
  height: 500px;
  background-color:#bbb;
  overflow:hidden;
}
.carousel img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 500px;
}
#searchForm {
  position:absolute;
    top:40%;
}
@media (max-width: 768px) {
  .carousel-inner>.item>img, .carousel-inner>.item>a>img {
    max-width:inherit;
  }
  .carousel-caption p {
    margin-bottom: 20px;
    font-size: 21px;
    line-height: 1.4;
  }
}
</style>


<div id="myCarousel" class="carousel slide">

  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <img src="/assets/example/bg_suburb.jpg">
      <div class="container">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
  </div>

    <div class="form-group col-sm-4 col-sm-offset-4">
      <div class="input-group input-group-lg center-block">
        <input type="text" class="form-control" placeholder="Search">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
      </div>
    </div>

  <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="fa fa-arrow-left"></i></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="fa fa-arrow-right"></i></a>

  </div>
