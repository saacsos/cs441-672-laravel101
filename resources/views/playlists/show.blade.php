<x-layouts.main>

    <div class="flex items-center justify-between">
        <div class="flex items-center">

            <div class="text-5xl ml-4">
                {{ $playlist->name }}
            </div>
        </div>
        <div>
            <a href="{{ route('playlists.edit', ['playlist' => $playlist]) }}" class="px-4 py-1 bg-green-300 shadow-md text-sm">
                Edit this playlist
            </a>
        </div>
    </div>

    <h2 class="text-2xl text-center mt-8">
        {{ $playlist->songs->count() }} Songs
    </h2>

    @foreach($playlist->songs as $song)
        <x-songs.track :song="$song"></x-songs.track>
    @endforeach

</x-layouts.main>
