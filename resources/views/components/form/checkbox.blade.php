
<label for="{{$name}}">{{$label ?? ''}}</label>
<input type="checkbox" name="{{$name}}" id="{{$name}}" value="1" {{$checked == 0 ? '' : 'checked'}} >
