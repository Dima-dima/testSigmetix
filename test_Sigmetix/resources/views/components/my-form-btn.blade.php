@php
    $useDefault = isset($class) ? false : true;
@endphp

<button {{ $attributes->merge(['type'=>'submit']) }} {{ $attributes->class(["btn","float-end","btn-primary"=>$useDefault]) }}>{{ $slot }}</button>
