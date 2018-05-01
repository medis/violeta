@section('toolbar')
    @if ($vars['entity']->id)
        {{ Form::open(['method' => 'DELETE', 'url' => $vars['entity']->url->delete]) }}
            {{ Form::submit('Delete', ['class' => 'p-0']) }}
        {{ Form::close() }}
    @endif
@endsection

@include('backend.partials.errors')

{!! Form::model($vars['entity'], ['url' => $vars['route'], 'method' => $vars['entity']->id ? 'put' : 'post']) !!}


<div class="col-sm-12 flex flex-inline">
    <div class="w-1/6">{{ Form::label('title', 'Title') }}</div>
    <div class="w-5/6">{{ Form::text('title', null, ['required', 'class' => 'field']) }}</div>
</div>

<div class="">
    {{ Form::label('source', 'Source') }}
    {{ Form::text('source', null, ['required']) }}
</div>

<div class="">
    {{ Form::label('link', 'Link') }}
    {{ Form::url('link', null, ['required']) }}
</div>

<div class="">
    {{ Form::label('date', 'Date') }}
    {{ Form::date('date', Carbon\Carbon::parse($vars['entity']->date)->format('Y-m-d'), ['required']) }}
</div>

<div class="">
    <div class="{{ !$vars['entity']->id ? 'hidden' : '' }}">
        {{ Form::label('enabled', 'Enabled') }}
        {{ Form::checkbox('enabled') }}
    </div>
</div>


<div class="">
    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
</div>
{!! Form::close() !!}
