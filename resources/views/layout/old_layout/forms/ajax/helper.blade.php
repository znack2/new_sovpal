<div class="form-group" style="margin-top:50px;">
    

    <h4>Напиши</h4>
    <p>{{ trans('sovpal.help.profile_form') }}</з>
    <textarea class="form-control" id="ask" name="ask" placeholder="{{ old('ask') }}"></textarea>
    {{$errors->first('ask', '<li class="error">:message</li>')}}
</div> 