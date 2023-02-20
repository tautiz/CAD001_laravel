@if(count($iterable) >= 1)
    <table>
        <thead>
        <tr>
            @foreach($fields as $attribute)
                <td>{{__($mainRoute . '.'. $attribute)}}</td>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($iterable as $model)
            <tr>
                @foreach($fields as $attribute)
                    <td>{{$model->$attribute}}</td>
                @endforeach
                <td>
                    <x-forms.buttons.action :model="$model" :display-show-link="true"/>
                    @yield('action')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>{{__('general.no_records')}}</p>
@endif
