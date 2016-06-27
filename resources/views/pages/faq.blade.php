<div class="content">

<h3 class="row text-center"><div class="logo"></div></h3>

 <h2 class="text-center">{{trans('pages.faq.title')}}<br>
 <small class="size14 text-center">{{trans('pages.faq.message')}}</small></h2>

     <div id="faq" class="col-md-12">
     @for($number = 1; $number < 13; $number ++)
               <div class="panel-group" id="accordion{{ $number }}">
                 <div class="panel-default">
                   <div class="panel-heading">
                     <h2 class="panel-title">
                       <a class="bold accordion-toggle" data-toggle="collapse" data-parent="#accordion{{ $number }}" href="#collapse-{{ $number }}">
                       {{trans('pages.faq.title'.$number)}}»
                       </a>
                       <small class="pull-right">{{ trans('pages.expand') }}<i class="fa fa-arrow-down"></i></small>
                     </h2>
                   </div>
                   <div id="collapse-{{ $number }}" class="panel-collapse collapse">
                     <div class="panel-body">
                       <p> {{trans('pages.faq.description'.$number)}}
                       </p>
                     </div>
                     <div class="panel-footer">
                       <div class="btn-group btn-group-xs"><span class="btn">{{trans('pages.faq.useful')}}</span>
                        <a class="btn btn-success" href="#"><i class="fa fa-thumbs-up"></i>{{trans('sovpal.yes')}}</a>
                        <a class="btn btn-danger" href="#"><i class="fa fa-thumbs-down"></i>{{trans('sovpal.no')}}</a></div>
                     </div>
                   </div>
                 </div>
               </div>
         @endfor
     </div>

         <div class="col-md-12 subscribe_form well">

         <h3 class="row text-center"><div class="logo"></div></h3>
         <h4 class="bold size16 text-center">{{ trans('pages.faq.extra_question') }}</h4>
            <div class="col-xs-offset-3 col-xs-6 ">
                @include('layout.forms._basic.default',
                 ['model' => 'ajax','method'=>'faq','type' => 'panel','message'=>'Tell us about a shop you would like to see here','button'=>'Send a request',
                 'modal_data'=>null])
             </div>
         </div>
 </div>