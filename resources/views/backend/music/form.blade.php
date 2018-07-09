@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>{{ $vars['page_title'] }}</span>
        <span class="ml-auto">
            @if ($vars['entity']->id)
                {{ Form::open(['method' => 'DELETE', 'url' => $vars['entity']->url->delete]) }}
                    {{ Form::submit('Delete', ['class' => 'p-0']) }}
                {{ Form::close() }}
            @endif
        </span>
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
        <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('type', 'Type') }}</div>
        <div class="w-5/6">{{ Form::select('type', $vars['types'], ['class' => 'form-control', 'required']) }}</div>
    </div>

    <div class="col-sm-12 mb-4 flex flex-inline">
        <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('source', 'Link') }}</div>
        <div class="w-5/6">{{ Form::url('source', $vars['entity']->getLink(), ['class' => 'field', 'required']) }}</div>
    </div>

    <div class="col-sm-12 mb-4 flex flex-inline">
        <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('featured', 'Featured') }}</div>
        <div class="w-5/6">{{ Form::checkbox('featured') }}</div>
    </div>

    <div class="col-sm-12 mb-4 flex flex-inline">
        <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('weight', 'Weight') }}</div>
        <div class="w-5/6">{{ Form::text('weight', null, ['class' => 'field']) }}</div>
    </div>

    <div class="{{ !$vars['entity']->id ? 'hidden' : '' }}">
        <div class="col-sm-12 mb-4 flex flex-inline">
            <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('enabled', 'Enabled') }}</div>
            <div class="w-5/6">{{ Form::checkbox('enabled') }}</div>
        </div>
    </div>

    {{ Form::submit($vars['entity']->id ? 'Update' : 'Create', ['class' => 'bg-green text-white rounded py-3 px-4']) }}

    {!! Form::close() !!}

@endsection