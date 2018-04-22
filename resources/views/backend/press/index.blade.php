@extends('layouts.backend')

@section('toolbar')
    <ul class="list-reset text-right">
        <li><a href="{{ route('backend.press.create') }}">Create new Press Article</a></li>
    </ul>
@endsection

@section('content')

    @if ($presses->isEmpty())
        <p>No press articles yet.</p>
    @else

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Source</th>
                <th>Link</th>
                <th>Date</th>
                <th>Enabled</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($presses->items() as $press)
                <tr>
                    <td>{{ $press->title }}</td>
                    <td>{{ $press->source }}</td>
                    <td><a href="{{ $press->link }}" target="_blank"><i class="glyphicon glyphicon-globe"></i></a></td>
                    <td>{{ $press->date }}</td>
                    <td><i class="glyphicon {{ $press->enabled ? 'glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></i></td>
                    <td>{{ $press->created_at }}</td>
                    <td><a href="{{ $press->url->edit }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
            {{ $presses->links() }}
        </nav>

    @endif

@endsection