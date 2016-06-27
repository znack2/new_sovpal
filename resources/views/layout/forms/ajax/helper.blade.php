<div class="form-group" style="margin-top:50px;">
    <label for="ask" class="row control-label">{{ trans('sovpal.help.profile_form') }}</label>
    <div class="row">
        <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control" id="ask" name="ask" placeholder="{{ old('ask') }}"></textarea>
        {{$errors->first('ask', '<li class="error">:message</li>')}}
    </div>
</div> 