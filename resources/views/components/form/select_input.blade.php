<div class="inputArea">
            <label for="{{$name}}">{{$label ?? ''}}</label>
            <select name="{{$name}}" {{empty($required) ? '' : 'required' }} id="{{$name}}">
                    <option name="" selected disabled>Selecione uma opção</option>
                   {{$slot}}
            </select>
</div>