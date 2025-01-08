<nav class="container mx-auto flex h-12 items-center px-4 lg:px-8 text-lg">
    <div class="space-x-4 grow">
        <a href="{{ route('about.index') }}" class="menu-link">About</a>
        <a href="{{ route('artists.index') }}" class="menu-link">Artists</a>
        @auth
            <a href="{{ route('playlists.index') }}" class="menu-link">My Playlists</a>
        @endauth
    </div>
    <div class="space-x-4">

        @guest
            <a href="{{ route('login') }}" class="menu-link">Login</a>
            <a href="{{ route('register') }}" class="menu-link">Register</a>
        @else
            <p class="inline-block">
                {{ auth()->user()->name }}
            </p>
            <form action="{{ route('logout') }}" method="POST" class="inline-block">
                @csrf
                <button class="menu-link" type="submit">Logout</button>
            </form>
        @endguest
    </div>
</nav>
