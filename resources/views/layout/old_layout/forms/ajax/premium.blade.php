
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="cardNumber">{{ trans('sovpal.CARDNUMBER') }}</label>
                <div class="input-group">
                    <input type="tel"class="form-control"name="cardNumber"placeholder="{{ trans('sovpla.ValidNumber') }}" autocomplete="cc-number" required autofocus /> 
                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-7 col-md-7">
            <div class="form-group">
                <label for="cardExpiry"><span class="hidden-xs">{{ trans('sovpal.EXPIRATION') }}</span><span class="visible-xs-inline">{{ trans('sovpal.EXP') }}</span>{{ trans('sovpal.DATE') }} </label>
                <input type="tel" class="form-control" name="cardExpiry" placeholder="{{ trans('sovpal.MM/YY') }}" autocomplete="cc-exp" required /> 
            </div>
        </div>
        <div class="col-xs-5 col-md-5 pull-right">
            <div class="form-group">
                <label for="cardCVC">{{ trans('sovpal.code') }}</label>
                <input type="tel" class="form-control" name="cardCVC" placeholder="{{ trans('sovpal.CVC') }}" autocomplete="cc-csc" required /> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="couponCode">{{ trans('sovpal.coupon') }}</label>
                <input type="text" class="form-control" name="couponCode" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-success btn-lg btn-block" type="submit">{{ trans('sovpal.pay') }}</button>
        </div>
    </div>

    <div class="row" style="display:none;"> <div class="col-xs-12"> <p class="payment-errors"></p> </div> </div>