@extends("layouts.main")

@section("content")
    <div class="container border rounded px-5 py-5 d-flex flex-column align-items-center">


        <x-my-form action="{{ route('addDataProcess') }}" method="POST" title="{{ $title ?? '' }}">

            <x-error-msg></x-error-msg>

                <x-my-input required label="First name" id="first_name" name="first_name" value="{{ old('first_name') }}"></x-my-input>
                <x-my-input required label="Last name" id="last_name" name="last_name"  value="{{ old('last_name') }}"></x-my-input>
                <x-my-input required type="email" required label="Email" id="email" name="email"  value="{{ old('email') }}"></x-my-input>

                <x-my-form-btn>{{ __("Add") }}</x-my-form-btn>
        </x-my-form>

        <div class="my-2">
            <x-my-btn class="btn-success" href="{{ route('showData', getDataSourceForRoute()) }}"> {{ __('Back') }} </x-my-btn>
        </div>


    </div>
@endsection
