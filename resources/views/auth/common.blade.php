@extends('layouts.backend')

@section('content')

    <div class="flex items-center justify-center h-full">

        <div class="container">
            <div class="w-1/2 m-auto">

                @yield('centered_content')

            </div>
        </div>

    </div>
@endsection
