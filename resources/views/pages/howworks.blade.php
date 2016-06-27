<div class="modal fade" id="howworks" tabindex="-1" role="dialog" aria-labelledby="">
  <div class="modal-dialog2 text-center" role="document">
        <section id="about" style="padding-bottom: 20px;z-index: 9999;>
            <div class="page-container-responsive panel-contrast text-contrast">
            <div class="section-heading inverse" style="margin:0;">
                <div class="hidden-xs content text-center">
                    <h3> <div class="logo"></div><p>Sovpal.Ru</p></h3>
                </div>
                <h1>{{ trans('sovpal.pagehow') }}</h1>
                <div class="divider"></div>
                <br>
                <br>
                <br>
                {{--<p>{{ trans('sovpal.pagehow_description') }}</p>--}}
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                     <div class="arrow hidden-xs"></div>
                    <div class="about-item">
                        <i class="white_c fa fa-download fa-2x"></i>
                        <h3 class="white_c">{{ trans('pages.landing.step1') }}</h3>
                        <p class="white_c">{{ trans('pages.landing.step1_description') }}</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="arrow hidden-xs"></div>
                    <div class="about-item">
                        <i class="white_c fa fa-mobile fa-2x"></i>
                        <h3 class="white_c">{{ trans('pages.landing.step2') }}</h3>
                        <p class="white_c">{{ trans('pages.landing.step2_description') }}</p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12" >
                    <div class="about-item">
                        <i class="white_c fa fa-users fa-2x"></i>
                        <h3 class="white_c">{{ trans('pages.landing.step3') }}</h3>
                        <p class="white_c">{{ trans('pages.landing.step3_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <button type="button" class="btn btn-primary inverse btn-lg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">CLOSE</span></button>
            </div>
        </div>
        </section>
    </div>
</div>
