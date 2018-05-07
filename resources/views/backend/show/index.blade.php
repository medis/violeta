@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>List of shows</span>
        <ul class="ml-auto list-reset text-right">
            <li><a href="{{ route('backend.show.create') }}">Create new Show</a></li>
        </ul>
    </div>
@endsection

@section('content')

    @if ($shows->isEmpty())
        <p>No shows yet.</p>
    @else

        <table class="w-full border-spacing">
            <thead>
                <tr class="text-left">
                    <th class="border-b-2">Venue</th>
                    <th class="border-b-2">Address</th>
                    <th class="border-b-2">Date</th>
                    <th class="border-b-2">Enabled</th>
                    <th class="border-b-2">Created at</th>
                    <th class="border-b-2">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($shows->items() as $show)
                <tr class="py-3">
                    <td>{{ $show->venue }}</td>
                    <td>{{ $show->address }}</td>
                    <td>{{ $show->date }}</td>
                    <td>{!! $show->enabled ? '&#10003;' : '&#x2717;' !!}</td>
                    <td>{{ $show->created_at }}</td>
                    <td><a href="{{ $show->url->edit }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
            {{ $shows->links() }}
        </nav>

    @endif

@endsection