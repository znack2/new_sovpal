<section class="col-xs-12 col-md-12" id="footer_down">
    <div class="text-center">
    <a href="{{ route($currentRoute,[ $data->type =>$data->getPrevious()]) }}"
    class="col-xs-4 col-md-4 btn btn-white btn-large">
    <i class="fa fa-angle-double-left fa-lg"></i>
    <span class="hidden-xs">{{ trans('sovpal.forms.Previous') }}</span>
    </a>

    <a href="{{ route($currentRoute,[ $data->type=>$data->getNext()]) }}"
    class="col-xs-push-4 col-xs-4 col-md-4 btn btn-white btn-large">
    <span class="hidden-xs">{{ trans('sovpal.forms.Next') }}</span>
    <i class="fa fa-angle-double-right fa-lg"></i></a>
    </div>
</section>