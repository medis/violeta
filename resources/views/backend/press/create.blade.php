@extends('layouts.backend')

@section('page_title')
    Create Press article
@endsection

@section('content')
    @include('press.form', ['vars' => $vars])
@endsection
