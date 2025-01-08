<x-layouts.main>
    <h1 class="text-5xl">My Playlists</h1>

    <div>
        <a href="{{ route('playlists.create') }}">Add New Playlist</a>
    </div>

    <div>
        @foreach($playlists as $playlist)
            <div class="mt-8">
                <a href="{{ route('playlists.show', ['playlist' => $playlist]) }}">
                    {{ $playlist->name }}
                </a>
            </div>

        @endforeach
    </div>
</x-layouts.main>
