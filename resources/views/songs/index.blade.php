<x-layouts.main>


    <div class="mt-8">
        @foreach($songs as $song)
            <x-songs.track :song="$song"></x-songs.track>
        @endforeach
    </div>


</x-layouts.main>

