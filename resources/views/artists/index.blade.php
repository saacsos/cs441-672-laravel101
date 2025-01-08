<x-layouts.main>

    <h1 class="text-5xl">Artists</h1>

    @can('create', \App\Models\Artist::class)
        <div>
            <a href="{{ route('artists.create') }}" class="px-4 py-1 bg-green-300 shadow-md text-sm">
                Create New Artist
            </a>
        </div>
    @endcan

    <section class="mt-4">
        <div class="mb-4">
            {{ $artists->links() }}
        </div>

        <div class="grid grid-cols-3 gap-2 max-sm:grid-cols-1 max-md:grid-cols-2">
        @foreach($artists as $artist)
            <x-artists.panel :artist="$artist"></x-artists.panel>
        @endforeach
        </div>

        <div class="mt-4">
            {{ $artists->links() }}
        </div>
    </section>

</x-layouts.main>
