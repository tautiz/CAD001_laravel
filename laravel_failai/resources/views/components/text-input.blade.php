@props(['disabled' => false])

<div class="form-control">
    <label class="label">
        <span class="label-text">{{$attributes->get('help')}}</span>
    </label>
    <label class="input-group input-group-vertical">
        <span class="input input-bordered h-8">{{$attributes->get('label')}}</span>
        <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['type'=>"text", 'placeholder'=>$attributes->get('label'), 'class'=>"input input-bordered"]) !!} />
    </label>
</div>
