<div class="inputArea">
            <label for="{{$name}}">{{$label ?? ''}}</label>
            <input type="{{empty($type) ? 'text' : $type}}" placeholder="{{$placeholder ?? ''}}" 
            id="{{$name}}" name="{{$name}}" value="{{$value ?? ''}}" 
            {{empty($required) ? '' : 'required' }}>
</div>