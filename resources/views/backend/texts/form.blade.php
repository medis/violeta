@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>{{ $vars['page_title'] }}</span>
    </div>
@endsection

@section('content')

    @include('backend.partials.errors')

    {!! Form::model($vars['entity'], ['url' => $vars['route'], 'method' => $vars['entity']->id ? 'put' : 'post']) !!}


    <div class="col-sm-12 mb-4 flex flex-inline">
        <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('title', 'Title') }}</div>
        <div class="w-5/6">{{ Form::text('title', null, ['required', 'class' => 'field']) }}</div>
    </div>

    <div class="col-sm-12 mb-4 flex flex-inline">
        <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('body', 'Text') }}</div>
        <input name="body" id="body" type="hidden" value="{{ $vars['entity']->body }}">
        <div class="w-5/6"><trix-editor input="body"></trix-editor></div>
    </div>

    {{ Form::submit($vars['entity']->id ? 'Update' : 'Create', ['class' => 'bg-green text-white rounded py-3 px-4']) }}

    {!! Form::close() !!}

@endsection

@section('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.2/trix.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.2/trix.js"></script>
@endsection