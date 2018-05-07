@section('toolbar')
    @if ($vars['entity']->id)
        {{ Form::open(['method' => 'DELETE', 'url' => $vars['entity']->url->delete]) }}
            {{ Form::submit('Delete', ['class' => 'p-0']) }}
        {{ Form::close() }}
    @endif
@endsection

@include('backend.partials.errors')

{!! Form::model($vars['entity'], ['url' => $vars['route'], 'method' => $vars['entity']->id ? 'put' : 'post']) !!}


<div class="col-sm-12 mb-4 flex flex-inline">
    <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('venue', 'Venue') }}</div>
    <div class="w-5/6">{{ Form::text('venue', null, ['required', 'class' => 'field']) }}</div>
</div>

<div class="col-sm-12 mb-4 flex flex-inline">
    <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('address', 'Address') }}</div>
    <div class="w-5/6">{{ Form::text('address', null, ['required', 'class' => 'field']) }}</div>
</div>

<div class="col-sm-12 mb-4 flex flex-inline">
    <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('date', 'Date') }}</div>
    <div class="w-5/6">{{ Form::date('date', Carbon\Carbon::parse($vars['entity']->date)->format('Y-m-d'), ['required', 'class' => 'p-4 border rounded']) }}</div>
</div>

<div class="col-sm-12 mb-4 flex flex-inline">
    <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('time', 'Time') }}</div>
    <div class="w-5/6">{{ Form::time('time', Carbon\Carbon::parse($vars['entity']->date)->format('H:i'), ['required', 'class' => 'p-4 border rounded']) }}</div>
</div>

<div class="{{ !$vars['entity']->id ? 'hidden' : '' }}">
    <div class="col-sm-12 mb-4 flex flex-inline">
        <div class="w-1/6 justify-center flex-col flex text-xl">{{ Form::label('enabled', 'Enabled') }}</div>
        <div class="w-5/6">{{ Form::checkbox('enabled') }}</div>
    </div>
</div>

{{ Form::submit($vars['entity']->id ? 'Update' : 'Create', ['class' => 'bg-green text-white rounded py-3 px-4']) }}

{!! Form::close() !!}
