<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Repositories\PlaylistRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PlaylistController extends Controller implements HasMiddleware
{

    public function __construct(
        private PlaylistRepository $playlistRepository
    )
    {}

    // implement HasMiddleware and override method middleware()
    public static function middleware() : array
    {
        return [
            new Middleware('auth', except: ['show'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $playlists = $this->playlistRepository->getByUserId($user_id);
        return view('playlists.index', [
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $accessibility = $request->input('accessibility');

        $playlist = $this->playlistRepository->create([
            'name' => $name,
            'accessibility' => $accessibility,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('playlists.show', $playlist);
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        return view('playlists.show', ['playlist' => $playlist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        //
    }
}
