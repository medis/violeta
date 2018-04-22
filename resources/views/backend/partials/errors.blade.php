@if ($errors->any())
    <div class="bg-red text-white">
        <ul class="list-reset">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif