<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends Controller
{
    public const MEME_DIRECTORY = 'memes';

    public function __invoke(Request $request): BinaryFileResponse
    {
        $meme = Storage::disk('local')->path($this->getRandomMeme());

        return response()->file($meme, ['Cache-control' => 'no-cache, no-store, must-revalidate']);
    }

    private function getMemes(): array
    {
        return Storage::files(self::MEME_DIRECTORY);
    }

    private function getRandomMeme(): string
    {
        return collect($this->getMemes())->random();
    }
}
