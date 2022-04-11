@extends("layouts.main")

@section("content")
    <div class="container border rounded px-5 py-5 d-flex flex-column align-items-center">

        @if($user)
            <x-my-form action="{{ route('editUser') }}" method="POST" title="{{ $title ?? '' }}">
                @method('PUT')
                <x-error-msg></x-error-msg>

                <input type="hidden" id="id" name="id" value="{{ old('id') ?? $user->id }}"/>
                <x-my-input required label="First name" id="first_name" name="first_name" value="{{ old('first_name') ?? $user->first_name }}"></x-my-input>
                <x-my-input required label="Last name" id="last_name" name="last_name"  value="{{ old('last_name') ?? $user->last_name }}"></x-my-input>
                <x-my-input required type="email" required label="Email" id="email" name="email"  value="{{ old('email')  ?? $user->email }}"></x-my-input>

                <x-my-form-btn>{{ __("Edit") }}</x-my-form-btn>
            </x-my-form>
        @else
            <p> {{ __('There is no such user') }} </p>
        @endif


        <div class="my-2">
            <x-my-btn class="btn-success" href="{{ route('showData', getDataSourceForRoute()) }}"> {{ __('Back') }} </x-my-btn>
        </div>

    </div>
@endsection
