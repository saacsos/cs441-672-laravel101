<div class="text-sm leading-6 shadow-md">
    <a href="{{ route('artists.show', ['artist' => $artist]) }}">
        <figure class="relative flex flex-col-reverse bg-slate-100 rounded-lg p-6 dark:bg-slate-800 dark:highlight-white/5">
            <figcaption class="flex items-center space-x-4">
                <img src="{{ $artist->artist_image }}" alt="" class="flex-none w-14 h-14 rounded-full object-cover" loading="lazy" decoding="async">
                <div class="flex-auto">
                    <div class="text-base text-slate-900 font-semibold dark:text-slate-200">
                        {{ $artist->name }}
                    </div>
                    <div class="mt-0.5 dark:text-slate-300">
                        {{ $artist->songs->count() }} song(s)
                    </div>
                </div>
            </figcaption>
        </figure>
    </a>
</div>
