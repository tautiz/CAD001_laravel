@php
    $reflect = new ReflectionClass($model);
    $translation = lcfirst($reflect->getShortName()) . '.' . $field;
@endphp

<div>
    <x-input-label :for="'field_'.$field" :value="__($translation)" />

    <select name="{{$field}}" id="{{'field_'.$field}}">
    @foreach($options as $option)
        <option value="{{$option}}">{{$option}}</option>
    @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get($field)" />
</div>
