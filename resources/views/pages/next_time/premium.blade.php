<div class="content">

<h2 class="text-center">{{trans('pages.premium.title')}}  <br>
<small class="size14 text-center">{{trans('pages.premium.message')}}</small></h2>


<style>
.credit-card-box .panel-title {
    display: inline;
    font-weight: bold;
}
.credit-card-box .form-control.error {
    border-color: red;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
}
.credit-card-box label.error {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box .payment-errors {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box label {
    display: block;
}
.credit-card-box .display-table {
    display: table;
}
.credit-card-box .display-tr {
    display: table-row;
}
.credit-card-box .display-td {
    display: table-cell;
    vertical-align: middle;
    width: 50%;
}
.credit-card-box .panel-heading img {
    min-width: 180px;
}
</style>


     <br>
     <h3></h3>
     <br>

     <div class="col-xs-12 col-md-7" style="padding-left:30px;">
         <h3><div class="pull-left logo" style="margin:5px 10px;"></div>{{trans('pages.premium.Features')}}:</h3><hr>
          <ul>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature1') }}</span></h4></li>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature2') }}</span></h4></li>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature3') }}</span></h4></li>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature4') }}</span></h4></li>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature5') }}</span></h4></li>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature6') }}</span></h4></li>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature7') }}</span></h4></li>
              <li><h4><i class="pull-left fa fa-check fa-lg"></i><span style="margin:0 20px;">{{ trans('pages.premium.feature8') }}</span></h4></li>
          </ul>
     </div>

     <div class="col-xs-6">
        <p class="lead">Register now for <span class="text-success">FREE</span></p>
        <ul class="list-unstyled" style="line-height: 2">
            <li><span class="fa fa-check text-success"></span> See all your orders</li>
            <li><span class="fa fa-check text-success"></span> Fast re-order</li>
            <li><span class="fa fa-check text-success"></span> Save your favorites</li>
            <li><span class="fa fa-check text-success"></span> Fast checkout</li>
            <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
            <li><a href="/read-more/"><u>Read more</u></a></li>
        </ul>
        <p><a href="/new-customer/" class="btn btn-info btn-block">Yes please, register now!</a></p>
    </div>

     <div class="col-xs-12 col-md-5">
         <div class="panel panel-default credit-card-box">
             <div class="panel-heading display-table" >
                 <div class="display-tr" >
                     <h3 class="panel-title display-td" >{{trans('pages.premium.PaymentDetails')}}</h3>
                     <div class="display-td" >
                         <img class="img-responsive pull-right" src="#">
                     </div>
                 </div>
             </div>
             <div class="panel-body well">
                  @include('......layout.forms.ajax.premium')
             </div>
         </div>
     </div>


        <div class="price" id="price">
          <div class="container">
            <h2 class="size24 bold">{{ trans('sovpal.premium.title1') }}</h2>
            <p class="text-center">{{ trans('sovpal.premium.message1') }}</p>

            <div class="row">

              <div class="col-md-4 text-center">
               <i class="fa fa-user"></i>
               <h2 class="size24 bold">{{ trans('sovpal.premium.title2') }}</h2>
               <p class="text-center">{{ trans('sovpal.premium.message2') }}</p>
               <div class="btn btn-white"><a href><label>{{ trans('sovpal.$') }}</label>{{ trans('sovpal.premium.plan1') }}</a></div>
            </div>

              <div class="col-md-4 price-grid text-center">
                <i class="fa fa-user"></i>
                <h2 class="size24 bold">{{ trans('sovpal.premium.title3') }}</h2>
                <p class="text-center">{{ trans('sovpal.premium.message3') }}</p>
               <div class="btn btn-white"><a href><label>{{ trans('sovpal.$') }}</label>{{ trans('sovpal.premium.plan2') }}</a></div>
            </div>

              <div class="col-md-4 price-grid text-center">
               <i class="fa fa-user"></i>
               <h2 class="size24 bold">{{ trans('sovpal.premium.title4') }}</h2>
               <p class="text-center">{{ trans('sovpal.premium.message4') }}</p>
               <div class="btn btn-white"><a href><label>{{ trans('sovpal.$') }}</label>{{ trans('sovpal.premium.plan3') }}</a></div>
            </div>

            </div>

          </div>
        </div>


        <div class="Card">
            <span class="Card__difficulty">Intermediate</span>
            <span class="Card__updated-status Label Label--x-small">Updated!</span>

            <div class="Card__image">
                <a href="#">
                    <img src="#" class="Card__image" alt="Charting and You">
                    <div class="Card__overlay"><i class="material-icons">play_circle_outline</i></div>
                </a>
            </div>

            <div class="Card__details">
                <h3 class="Card__title"> <a href="/series/charting-and-you"> Charting and You </a> </h3>
                <div class="Card__count"> 4 <span class="utility-muted"> videos </span></div>
            </div>
        </div>

        <style>
        .Card:nth-child(1n) {
            float: left;
            margin-right: 30px;
            clear: none;
        }
        .Card {
            position: relative;
            overflow: hidden;
            margin-bottom: 60px;
            color: #3a3a3a;
            border-bottom: 1px solid rgba(0,0,0,.1);
            border-right: 1px solid rgba(0,0,0,.1);
            border-left: 1px solid rgba(0,0,0,.1);
            border-radius: 4px;
            width: calc(99.99% * 1/4 - 22.5px);
        }

        .Card__image {
            position: relative;
            max-width: 100%;
            display: block;
        }

        .Card__difficulty {
            color: #e6e6e6;
            position: absolute;
            z-index: 1;
            left: 12px;
            top: 3px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .2px;
        }
        .Card__updated-status {
            position: absolute;
            padding: 2px 4px;
            background: #573e81;
            right: 12px;
            top: 10px;
            z-index: 2;
            font-size: 12px;
        }

        .Card__details {
            background: #fff;
            padding: 8px 12px;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .Card__overlay {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            background-color: transparent;
            transition: background-color .4s;
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .Card__overlay>i {
            font-size: 6em;
            transition: color .4s;
            color: transparent;
        }
        .Card__title {
            margin: 0;
            font-size: 17px;
            font-weight: 600;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
        .Card__count {
            font-weight: 600;
            text-align: right;
            font-size: 22px;
            padding-left: 10px;
        }
        .Card__count span {
            font-weight: 400;
            display: block;
            font-size: 13px;
            margin-top: -5px;
        }
        .utility-muted {
            color: #9ba6b5;
        }
        </style>


        <div class="Plan Grid__column">
            <h2 class="Plan__type"> monthly </h2>

            <h3 class="Plan__price"> <span class="dollar">$</span>9 </h3>

            <div class="Plan__purchase">
                <a href="/signup?plan=monthly" class="Button Button--White">
                    This looks good to me
                </a>
            </div>
        </div>

        <style>
        .Plan:nth-child(3n+1) {
            clear: left;
        }
        .Plan:nth-child(1n) {
            float: left;
            margin-right: 30px;
            clear: none;
        }
        .Plan:nth-child(2) {
            background: #00baf3;
        }
        .Plan:nth-child(3) {
            background: #c2d09a;
        }
        .Plan:nth-child(3n) {
            margin-right: 0;
            float: right;
        }
        .Plan {
            background: #708095;
            padding: 25px 30px 28px;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            height: 410px;
            width: calc(99.99% * 1/3 - 20px);
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .Plan__type {
            color: #fff;
            font-size: 50px;
            margin: 0;
            line-height: 1;
        }
        .Plan__price {
            font-size: 120px;
            line-height: 1;
            letter-spacing: -5px;
            margin: 0;
            color: #fff;
        }
        .Plan__price>.dollar {
            color: #e2e1e7;
            content: '$';
            display: inline-block;
            vertical-align: top;
            font-size: .4em;
            width: 28px;
            margin-right: 6px;
            margin-left: -34px;
        }


        .Button--White {
            background: linear-gradient(180deg,#00c0f9,#00b3ec);
            padding: 15px 45px;
            color: #fff;
            border: none;
            font-family: museo-sans-rounded;
            font-weight: 700;
            font-size: 16px;
        }
        .Button {
            border-radius: 4px;
            text-decoration: none;
            border: none;
            border-bottom: 1px solid #e6e6e6;
            background: #f2f2f2;
            font-size: 14px;
            width: 100%;
            overflow: hidden;
            text-align: center;
            display: inline;
            padding: 12px;
            color: #7b7b7b;
            line-height: 1;
        }
        </style>
     
 </div>