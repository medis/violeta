@section('toolbar')
    @if ($vars['entity']->id)
        {{ Form::open(['method' => 'DELETE', 'url' => $vars['entity']->url->delete]) }}
            {{ Form::submit('Delete', ['class' => 'p-0']) }}
        {{ Form::close() }}
    @endif
@endsection

@include('backend.partials.errors')

{!! Form::model($vars['entity'], ['url' => $vars['route'], 'method' => $vars['entity']->id ? 'put' : 'post']) !!}


<div class="col-sm-12">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['required']) }}
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
