<div>
    <x-text-input :label="__($model->getTable() . '.field.' . $field)"
                  :name="$field"
                  :value="old($field, $model->$field)"
                   />
    <x-input-error class="mt-2" :messages="$errors->get($field)" />
</div>
