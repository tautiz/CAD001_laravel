@php
    $reflect = new ReflectionClass($model);
    $translation = lcfirst($reflect->getShortName()) . '.' . $field;
@endphp

<div class="form-control">
    <label class="label">
        <span class="label-text">{{$attributes->get('label')}}</span>
    </label>
    <label class="input-group input-group-vertical">
        <span class="input input-bordered h-8">{{__($translation)}}</span>
        <select name="{{$field}}" id="{{'field_'.$field}}" class="select select-bordered">
            @foreach($options as $option)
                <option value="{{$option}}">{{$option}}</option>
            @endforeach
        </select>
    </label>
    <x-input-error class="mt-2" :messages="$errors->get($field)"/>
</div>
