        <!--REVIEW-->
        {{--<section id="reviews">--}}
            {{--<div class="container">--}}
                {{--<div class="section-heading inverse scrollpoint sp-effect3">--}}
                    {{--<h1>{{ trans('pages.landing.pagereview') }}</h1>--}}
                    {{--<div class="divider"></div>--}}
                    {{--<p>{{ trans('pages.landing.pagereview_description') }}</p>--}}
                {{--</div>--}}
                {{--<div class="col-lg-offset-3 col-lg-6">--}}
                    {{--<div class="col-md-10 col-md-push-1 scrollpoint sp-effect3">--}}
                        {{--<div class="review-filtering">--}}
                         {{--@foreach($reviews as $review)--}}
                            {{--<div class="review {{ $review != reset($reviews) ? '' : 'rollitin' }}">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-2">--}}
                                        {{--<div class="review-person">--}}
                                            {{--<img src="http://api.randomuser.me/portraits/{{ $review->user->type.'./.'.$review->user->images()->first() }}.jpg" alt="" class="img-responsive">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-10">--}}
                                        {{--<div class="review-comment">--}}
                                            {{--<h3>{{ $review->comment }}</h3>--}}
                                            {{--<p>{{ $review->user->first_name . $review->user->last_name }}--}}
                                                {{--<span>--}}
                                                    {{--@foreach($review->stars as $rating)--}}
                                                      {{--<i class="fa fa-star{{ $rating  ? '-half-o : "-o" }} fa-lg"></i>--}}
                                                    {{--@endforeach--}}
                                                {{--</span>--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                         {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}