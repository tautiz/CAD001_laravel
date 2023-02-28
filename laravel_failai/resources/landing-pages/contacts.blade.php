@extends('main')

@section('title', __('general.meniu.contact'))

@section('content')
    <h1>{{__('general.meniu.contact')}}</h1>
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="input-field col s6">
                <input id="name" name="name" type="text" class="validate">
                <label for="name">{{__('contacts.name')}}</label>
            </div>
            <div class="input-field col s6">
                <input id="email" name="email" type="email" class="validate">
                <label for="email">{{__('contacts.email')}}</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="message" name="message" class="materialize-textarea"></textarea>
                <label for="message">{{__('contacts.message')}}</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">{{__('contacts.send')}}
            <i class="material-icons right">send</i>
        </button>
    </form>
    @if(session('success'))
        <div class="card-panel green lighten-2">{{session('success')}}</div>
    @endif
    @if(session('error'))
        <div class="card-panel red lighten-2">{{session('error')}}</div>
    @endif
    @if($errors->any())
        <div class="card-panel red lighten-2">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

@endsection
