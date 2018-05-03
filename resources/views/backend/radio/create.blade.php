@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>{{ $vars['page_title'] }}</span>
        <span class="ml-auto">@parent</span>
    </div>
@endsection

@section('content')
    @include('backend.radio.form', ['vars' => $vars])
@endsection
