<x-layouts.main>

    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <img src="{{ $artist->image_path }}" alt="" class="w-24 rounded-full">
            <div class="text-5xl ml-4">
                {{ $artist->name }}
            </div>
        </div>
        @can('update', $artist)
            <div>
                <a href="{{ route('artists.edit', ['artist' => $artist]) }}" class="px-4 py-1 bg-green-300 shadow-md text-sm">
                    Edit this artist
                </a>
            </div>
        @endcan
    </div>

    <h2 class="text-2xl text-center mt-8">
        {{ $artist->songs->count() }} Songs
    </h2>

    @foreach($artist->songs as $song)
        <x-songs.track :song="$song"></x-songs.track>
    @endforeach

</x-layouts.main>
