<div class="h-full w-full flex-no-shrink bg-white border-r border-r border-grey">
    <a href="" class="text-lg block text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Texts</a>
    <a href="{{ route('backend.show.index') }}" class="text-lg block text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Shows</a>
    <a href="{{ route('backend.music.index') }}" class="text-lg block text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Music</a>
    <a href="{{ route('backend.press.index') }}" class="text-lg block text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Press</a>
    <a href="{{ route('backend.radio.index') }}" class="text-lg block text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Radios</a>

    <a
        href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="mt-8 text-lg block text-center py-4 border-b text-white no-underline bg-red hover:bg-red-light"
    >
        Logout
    </a>

    <form method="POST" id="logout-form" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>
</div>