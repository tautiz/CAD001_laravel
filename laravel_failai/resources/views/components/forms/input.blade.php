@php
    $reflect = new ReflectionClass($model);
    $translation = lcfirst($reflect->getShortName()) . '.' . $field;
@endphp

<div>
    <x-input-label :for="$field" :value="__($translation)" />
    <x-text-input :id="'field_'.$field"
                  :name="$field"
                  type="text"
                  class="mt-1 block w-full"
                  :value="old($field, $model->$field)"
                  autofocus
                  :autocomplete="$field" />
    <x-input-error class="mt-2" :messages="$errors->get($field)" />
</div>
