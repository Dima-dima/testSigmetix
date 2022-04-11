@props(['title'=>''])

<form {{ $attributes->class(['border','d-inline-block','rounded','px-4','py-4','w-50']) }} {{$attributes}}>
    @if(!empty($title))
        <h3> {{ $title }} </h3>
    @endif
    @csrf
    {{ $slot }}
</form>
