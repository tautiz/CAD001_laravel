@foreach($fields as $field)
    <x-forms.input field="{{$field}}" :model="$model"/>
@endforeach

