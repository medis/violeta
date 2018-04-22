@extends('layouts.backend')

@section('toolbar')
    {{ $vars['page_title'] }}
@endsection

@section('content')
    @include('backend.press.form', ['vars' => $vars])
@endsection
