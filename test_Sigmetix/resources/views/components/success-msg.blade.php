@if (session()->has('success'))
    <div id="msg_alert" class="alert alert-success ">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
@endif
