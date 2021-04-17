<div class="mb-3">
    <label for="{{$name.'-id'}}" class="form-label">{!! $label !!}</label>
    <input type="{{isset($type)?$type:'text'}}" name="{{$name}}" value="{!!$value!!}" class="form-control" id="{{$name.'-id'}}" placeholder="{!! $placeholder !!}">
</div>