<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends Controller
{
    private const MEME_DIRECTORY = 'memes';

    public function __invoke(Request $request): BinaryFileResponse
    {
        return response()->file($this->getRandomMeme());
    }

    private function getMemes(): array
    {
        return glob(self::MEME_DIRECTORY . "/*");
    }

    private function getRandomMeme(): string
    {
        return collect($this->getMemes())->random(1)->first();
    }
}
