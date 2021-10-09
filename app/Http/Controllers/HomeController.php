<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends Controller
{
    private const MEME_DIRECTORY = 'memes';

    public function __invoke(Request $request): BinaryFileResponse
    {
        return response()->file($this->getRandomMeme(), ['Cache-control' => 'no-cache, no-store, must-revalidate']);
    }

    private function getMemes(): array
    {
        return glob(public_path(self::MEME_DIRECTORY.DIRECTORY_SEPARATOR. "*"));
    }

    private function getRandomMeme(): string
    {
        return collect($this->getMemes())->random();
    }
}
