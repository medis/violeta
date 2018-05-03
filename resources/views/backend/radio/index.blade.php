@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>List of radios</span>
        <ul class="ml-auto list-reset text-right">
            <li><a href="{{ route('backend.radio.create') }}">Create new Radio</a></li>
        </ul>
    </div>
@endsection

@section('content')

    @if ($radios->isEmpty())
        <p>No radios yet.</p>
    @else

        <table class="w-full border-spacing">
            <thead>
            <tr class="text-left">
                <th class="border-b-2">Title</th>
                <th class="border-b-2">Link</th>
                <th class="border-b-2">Enabled</th>
                <th class="border-b-2">Created at</th>
                <th class="border-b-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($radios->items() as $radio)
                <tr class="py-3">
                    <td>{{ $radio->title }}</td>
                    <td><a href="{{ $radio->link }}" class="no-underline" target="_blank">@</a></td>
                    <td>{!! $radio->enabled ? '&#10003;' : '&#x2717;' !!}</td>
                    <td>{{ $radio->created_at }}</td>
                    <td><a href="{{ $radio->url->edit }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
            {{ $radios->links() }}
        </nav>

    @endif

@endsection