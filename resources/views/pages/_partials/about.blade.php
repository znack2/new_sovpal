<div class="content">
    <div class="container">
    <br>
    <br>

<div class="clearfix"></div>
            <div class="col-lg-12 col-sm-12 text-center">
                <h3 class="size40 blue_c">{{ trans('pages.about.title') }}</h3>
                <p class="text-center size14">{{ trans('pages.about.message') }}</p>
            </div>
            <hr>
   <!-- row of icons with numbers -->
            <section class="numbers">
                <h3>
                    <ul class="col-lg-12 icons">
                        <li class="col-lg-3 text-center">
                            <i class="round_icon">{{ trans('pages.about.number1') }}</i><br>
                            <h4 class="size14 bold" >{{ trans('h4ages.about.number1_info') }}</h4>
                        </li>

                        <li class="col-lg-3 text-center">
                            <i class="round_icon">{{ trans('pages.about.number2') }}</i><br>
                            <h4 class="size14 bold" >{{ trans('pages.about.number2_info') }}</h4>
                        </li>

                        <li class="col-lg-3 text-center">
                            <i class="round_icon">{{ trans('pages.about.number3') }}</i><br>
                            <h4 class="size14 bold" >{{ trans('pages.about.number3_info') }}</h4>
                        </li>

                        <li class="col-lg-3 text-center">
                            <i class="round_icon">{{ trans('pages.about.number4') }}</i><br>
                            <h4 class="size14 bold" >{{ trans('pages.about.number4_info') }}</h4>
                        </li>
                        <li class="clearfix"> </li>
                    </ul>
                </h3>
            </section>

            <section class="col-lg-12 feature">
                <div class="col-lg-6 col-sm-12">
                    <img src="{{ asset('assets/images/pages/mac1.png') }}" class="img-responsive" alt="" width=700px"/>
                </div>
                <div class="col-lg-offset-6 col-lg-6 col-sm-12">
                    <h3 class="red_c bold size24 section-heading">
                     <div class="pull-left logo"></div>
                     <span class="text-center" >{{ trans('pages.about.founder1') }}</span></h3>
                     <br>
                     <p class="size16">{{ trans('pages.about.founder1_info') }}</p>
                </div>
            </section>
                <div class="clearfix"></div>
            <section class="col-lg-12 feature">
                 <div class="col-lg-6 col-sm-12">
                    <img src="{{ asset('assets/images/pages/screen.png') }}" class="img-responsive" alt="" width=500px"/>
                 </div>
                <div class="col-lg-6 col-sm-12">
                    <h3 class="red_c bold size24 section-heading">
                    <div class="pull-left logo"></div>
                    <span class="text-center" >{{ trans('pages.about.founder1') }}</span></h3>
                    <br>
                    <p class="size16">{{ trans('pages.about.founder1_info') }}</p>
                </div>
             </section>
                <div class="clearfix"></div>

 <!-- founders-->

            <section class="founders">
                <div class="container">
                  <h3 class="size40 text-center blue_c">{{ trans('pages.about.title2') }}</h3>
                    <div class="col-lg-12">
                        <div class="col-xs-12 col-sm-6 text-center">
                            <div class="founder_image">
                                <img src="{{ asset('assets/images/pages/founder1.png') }}" class="img-responsive" alt="" width="200" height="200" />
                            </div>
                            <h3 class="size20 red_c">{{ trans('pages.about.founder1') }}<br>
                            <small class="size14 grey_c">{{ trans('pages.about.job1') }}</small><hr>
                            <p class="size14">{{ trans('pages.about.founder1_info') }}</p></h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-center">
                            <div class="founder_image">
                                <img src="{{ asset('assets/images/pages/founder1.png') }}" class="img-responsive" alt="" width="200" height="200" />
                            </div>
                            <h3 class="size20 red_c">{{ trans('pages.about.founder2') }}<br>
                            <small class="size14 grey_c">{{ trans('pages.about.job2') }}</small><hr>
                            <p class="size14">{{ trans('pages.about.founder2_info') }}</p></h3>
                        </div>
                    </div>

                </div>
            </section>
 <!-- slogan-->

        <div class="col-lg-offset-1 col-lg-10 text-center">
            <p class="red_c">{{ trans('pages.about.slogan') }}</p>
        </div>
    </div>
</div>
