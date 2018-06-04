@extends('layouts.backend')

@section('content')

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <p>hi</p>

@endsection
