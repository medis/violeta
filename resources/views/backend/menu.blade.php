<div class="w-1/6 flex h-full flex-col flex-no-shrink bg-white border-r border-r border-grey">
    <a href="" class="text-lg text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Texts</a>
    <a href="" class="text-lg text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Shows</a>
    <a href="" class="text-lg text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Music</a>
    <a href="" class="text-lg text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Press</a>
    <a href="" class="text-lg text-center py-4 border-b text-grey-darker no-underline hover:bg-grey-lightest">Radios</a>

    <a
        href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="mt-8 text-lg text-center py-4 border-b text-white no-underline bg-red hover:bg-red-light"
    >
        Logout
    </a>

    <form method="POST" id="logout-form" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>
</div>