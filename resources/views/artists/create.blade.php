<x-layouts.main>
    <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @csrf
                    <p class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Create new artist
                    </p>
                    <div>
                        <label for="artist_name" class="block mb-2 text-sm font-medium text-gray-900">
                            Artist name
                        </label>
                        @error('name')
                            <p class="text-red-600 text-xs">
                                {{ $message }}
                            </p>
                        @enderror
                        <input placeholder=""
                               class="bg-gray-50 border border-gray-300 @error('name') border-red-400 bg-red-100  @enderror text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                               id="artist_name" type="text" name="name" value="{{ old('name') }}">
                    </div>

                    <div>
                        <label for="artist_image">Artist Image</label>
                        @error('image')
                            <p class="text-red-600 text-xs">
                                {{ $message }}
                            </p>
                        @enderror
                        <input type="file" name="image" id="artist_image">
                    </div>

                    <button class="w-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  focus:ring-blue-800 text-white" type="submit">
                        Create
                    </button>

                </div>
            </div>
        </div>
    </form>

</x-layouts.main>
