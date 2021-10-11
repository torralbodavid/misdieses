<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_a_random_meme()
    {
        Storage::fake('local');

        Storage::disk('local')->putFile(HomeController::MEME_DIRECTORY, UploadedFile::fake()->image('image-1.png'));
        Storage::disk('local')->putFile(HomeController::MEME_DIRECTORY, UploadedFile::fake()->image('image-2.png'));
        Storage::disk('local')->putFile(HomeController::MEME_DIRECTORY, UploadedFile::fake()->image('image-2.png'));

        $this->get('/')
            ->assertStatus(200)
            ->assertHeader('Cache-control', 'must-revalidate, no-cache, no-store, public')
            ->assertHeader('Content-Type', 'image/png');
    }
}
