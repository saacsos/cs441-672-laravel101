<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $content = "<a href='https://cs.sci.ku.ac.th'>Computer Science</a>";
        return view('about.index', [
            'content' => $content,
        ]);  // dot notation
    }
}
