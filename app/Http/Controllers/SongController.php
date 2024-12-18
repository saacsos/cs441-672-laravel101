<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index() {
        $songs = collect([
            [
                'id' => 1,
                'title' => 'Supernova',
                'artist' => 'Aespa',
                'album' => 'Armageddon',
                'duration' => [
                    'minutes' => 3,
                    'seconds' => 10,
                ]
            ],
            [
                'id' => 2,
                'title' => 'Song for You',
                'artist' => 'Lee Isaacs',
                'album' => 'After the Apocalypses',
                'duration' => [
                    'minutes' => 2,
                    'seconds' => 48,
                ]
            ],
            [
                'id' => 3,
                'title' => 'ยังไงก็ได้ไป',
                'artist' => 'Season Five',
                'album' => 'Season Five',
                'duration' => [
                    'minutes' => 5,
                    'seconds' => 53,
                ]
            ],
        ]);

        return view('songs.index', [
            'songs' => $songs,
            'songs_count' => count($songs)
        ]);
    }
}
