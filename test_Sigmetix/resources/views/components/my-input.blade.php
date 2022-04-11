@props(['id'=>'','placeholder'=>'','label'=>'','required'])

@php
    $required_class = isset($required) ? 'required' : '';
@endphp

<div class="mb-2">
    <label for="{{ $id }}" {{ $attributes->class(['form-label', $required_class ]) }} > {{ $label }} </label>
    <input {{ $attributes->merge(['type'=>"text"]) }}  class="form-control" id="{{ $id }}" placeholder="{{ $placeholder }}" >
</div>
