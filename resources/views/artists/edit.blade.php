<x-layouts.main>

    <form action="{{ route('artists.update', ['artist' => $artist]) }}" method="POST">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @csrf
                    @method('PUT')
                    <p class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Edit artist
                    </p>
                    <div>
                        <label for="artist_name" class="block mb-2 text-sm font-medium text-gray-900">
                            Artist name
                        </label>
                        @error('name')
                            <p class="text-red-600 text-lg">{{ $message }}</p>
                        @enderror
                        <input placeholder="" class="bg-gray-50 border border-gray-300 @error('name') border-red-400 bg-red-100 @enderror text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                               id="artist_name" type="text" name="name" value="{{ old('name', $artist->name) }}">
                    </div>

                    <button class="w-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white" type="submit">
                        Update
                    </button>

                </div>
            </div>
        </div>
    </form>

    @can('delete', $artist)
        <div class="mt-8">
            <h2 class="text-4xl text-red-500">DANGER ZONE</h2>

            @if(session('error'))
                <p class="font-bold text-red-600">{{ session('error') }}</p>
            @endif

            <form action="{{ route('artists.destroy', ['artist' => $artist]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 px-4 py-2 shadow-sm border border-red-500">
                    Delete this artist
                </button>
            </form>
        </div>
    @endcan



</x-layouts.main>
