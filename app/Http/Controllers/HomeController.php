<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->file('storage/memes/test.webp', ['image/webp']);
    }
}
