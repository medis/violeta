@include('partials.errors')

@section('page_title')
    {{ $vars['page_title'] }}
@endsection

{!! Form::model($blog, ['route' => ['blog.update', $blog], 'method' => 'put']) !!}

<div class="row">

    <div class="col-sm-12">
        <div class="form-group title">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group source">
            {{ Form::label('source', 'Source') }}
            {{ Form::text('source', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group link">
            {{ Form::label('link', 'Link') }}
            {{ Form::url('link', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="col-sm-8">
        <div class="form-group date">
            {{ Form::label('date', 'Date') }}
            {{ Form::date('date', Carbon\Carbon::parse($blog->date)->format('Y-m-d'), ['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group enabled">
            {{ Form::label('enabled', 'Enabled') }}
            {{ Form::checkbox('enabled') }}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group submit">
            {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>
{!! Form::close() !!}

{{ Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $blog->id]]) }}
<div class="row float-right">
    <div class="col-sm-12">
        <div class="form-group delete negative-margin">
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
        </div>
    </div>
</div>
{{ Form::close() }}