@php
    $reflect = new ReflectionClass($model);
    $translation = lcfirst($reflect->getShortName()) . '.' . $field;
@endphp
<label>
    {{__($translation)}}
    @error($field)
    <span class="new badge red">
        @foreach ($errors->get($field) as $message)
            <strong>{{ $message }}</strong>
        @endforeach
    </span>
    @enderror
    <input
        type="text"
        name="{{$field}}"
        placeholder="{{__($translation)}}"
        value="{{old($field) ?? $model->$field}}"
        class="@error($field) is-invalid @enderror"
    >
</label>
