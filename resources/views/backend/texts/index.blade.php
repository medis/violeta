@extends('layouts.backend')

@section('toolbar')
    <div class="flex">
        <span>List of texts</span>
    </div>
@endsection

@section('content')

    @if ($texts->isEmpty())
        <p>No texts yet.</p>
    @else

        <table class="w-full border-spacing">
            <thead>
            <tr class="text-left">
                <th class="border-b-2">Title</th>
                <th class="border-b-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($texts->items() as $text)
                <tr class="py-3">
                    <td>{{ $text->title }}</td>
                    <td><a href="{{ $text->url->edit }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
            {{ $texts->links() }}
        </nav>

    @endif

@endsection