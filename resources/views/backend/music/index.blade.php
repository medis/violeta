@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>List of songs</span>
        <ul class="ml-auto list-reset text-right">
            <li><a href="{{ route('backend.music.create') }}">Create new Song</a></li>
        </ul>
    </div>
@endsection

@section('content')

    @if ($music->isEmpty())
        <p>No songs yet.</p>
    @else

        <table class="w-full border-spacing">
            <thead>
            <tr class="text-left">
                <th class="border-b-2">Title</th>
                <th class="border-b-2">Code</th>
                <th class="border-b-2">Type</th>
                <th class="border-b-2">Link</th>
                <th class="border-b-2">Featured</th>
                <th class="border-b-2">Big</th>
                <th class="border-b-2">Enabled</th>
                <th class="border-b-2">Created at</th>
                <th class="border-b-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($music->items() as $song)
                <tr class="py-3">
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->source }}</td>
                    <td>{{ $song->type }}</td>
                    <td><a href="{{ $song->getLink() }}" class="no-underline" target="_blank">@</a></td>
                    <td>{!! $song->featured ? '&#10003;' : '&#x2717;' !!}</td>
                    <td>{!! $song->big ? '&#10003;' : '&#x2717;' !!}</td>
                    <td>{!! $song->enabled ? '&#10003;' : '&#x2717;' !!}</td>
                    <td>{{ $song->created_at }}</td>
                    <td><a href="{{ $song->url->edit }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
            {{ $music->links() }}
        </nav>

    @endif

@endsection