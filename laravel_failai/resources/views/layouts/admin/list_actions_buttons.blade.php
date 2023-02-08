<a href="{{route($mainRoute.'.edit', $modelObject)}}"
   class="waves-effect waves-light btn">{{__('messages.edit')}}</a>
<form action="{{route($mainRoute.'.destroy', $modelObject)}}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" class="waves-effect waves-light btn" value="{{__('messages.delete')}}">
</form>
