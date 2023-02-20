<div class="grid grid-cols-{{count($fields) > 1 ? 2 : 1}} gap-4">
    @foreach($fields as $field)
        <x-forms.input field="{{$field}}" :model="$model"/>
    @endforeach
</div>

