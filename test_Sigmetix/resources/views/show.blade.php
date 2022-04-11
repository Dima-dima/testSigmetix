@extends("layouts.main")

@section("content")
    <div class="container border rounded px-5 py-5">
        <h1>{{ $title ?? __('Data from DB') }}</h1>

        <div class="my-2">
            <x-success-msg></x-success-msg>
        </div>

        <x-my-btn href="{{ route('welcome') }}" class="btn-primary btn-info btn-sm"> {{ __('Welcome page') }} </x-my-btn>
        <div>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('First name') }}</th>
                    <th scope="col">{{ __('Last name ') }}</th>
                    <th scope="col" >{{ __('Email') }}</th>
                    <th scope="col" >{{ __('Operations') }}</th>
                </tr>
                </thead>

            @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->first_name  ?? ' - ' }}</td>
                        <td>{{ $user->last_name ?? ' - ' }}</td>
                        <td>{{ $user->email ?? ' - ' }}</td>
                        <td>

                            <x-my-btn href="{{ route('editForm',['id'=>$user->id]) }}" class="btn-info"> {{ __('Edit') }} </x-my-btn>

                            <form class="d-inline-block" action="{{ route('deleteUser',['id'=>$user->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <x-my-form-btn  class="btn btn-danger"> {{ __("Delete") }} </x-my-form-btn>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5"> {{ __('There is no data yet') }}</td>
                    </tr>

            @endforelse
            </table>

        </div>

        <div class="mt-2">
            <x-my-btn href="{{ route('addData') }}" class="btn-primary"> {{ __('Add') }} </x-my-btn>
        </div>

    </div>
@endsection
