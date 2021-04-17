<div class="form-check">
    <input class="form-check-input" name="{{$name}}" type="checkbox" value="1" id="{{$name.'-id'}}" @if($checked) {{"checked"}} @endif>
    <label class="form-check-label" for="{{$name.'-id'}}">
        {!! $label !!}
    </label>
</div>