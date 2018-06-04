@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>List of press articles</span>
        <ul class="ml-auto list-reset text-right">
            <li><a href="{{ route('backend.press.create') }}">Create new Press Article</a></li>
        </ul>
    </div>
@endsection

@section('content')

    @if ($presses->isEmpty())
        <p>No press articles yet.</p>
    @else

        <table class="w-full border-spacing">
            <thead>
                <tr class="text-left">
                    <th class="border-b-2">Title</th>
                    <th class="border-b-2">Source</th>
                    <th class="border-b-2">Link</th>
                    <th class="border-b-2">Date</th>
                    <th class="border-b-2">Enabled</th>
                    <th class="border-b-2">Created at</th>
                    <th class="border-b-2">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($presses->items() as $press)
                <tr class="py-3">
                    <td>{{ $press->title }}</td>
                    <td>{{ $press->source }}</td>
                    <td><a href="{{ $press->link }}" class="no-underline" target="_blank">@</a></td>
                    <td>{{ $press->date }}</td>
                    <td>{!! $press->enabled ? '&#10003;' : '&#x2717;' !!}</td>
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