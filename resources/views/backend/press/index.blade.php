@extends('layouts.backend')

@section('toolbar')
    <ul class="list-reset text-right">
        <li><a href="{{ route('backend.press.create') }}">Create new Press Article</a></li>
    </ul>
@endsection

@section('content')

    @if ($press->isEmpty())
        <p>No press articles yet.</p>
    @else
        <p>hi</p>
    @endif

@endsection