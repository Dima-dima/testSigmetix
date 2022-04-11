@extends("layouts.main")

@section("content")
    <div class="container border rounded px-5 py-5">
        <h1>{{ __('Show necessary data') }}</h1>
        <div>
            <x-my-btn href="{{ route('showData') }}" class="btn-primary"> {{ __('Show sql') }} </x-my-btn>
            <x-my-btn href="{{ route('showData',['alternative_storage'=>1]) }}" class="btn-primary"> {{ __('Show sqlite') }} </x-my-btn>
        </div>
    </div>
@endsection
