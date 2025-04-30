<?php

declare(strict_types=1);

namespace Tests\Admin;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    #[Test]
    public function canBeCreated()
    {
        $artist = Artist::factory()->make();

        $this->actingAsAdmin();

        $this->post(route('admin.artists.store'), $artist->toArray());

        $this->assertDatabaseCount('artists', 1);
        $this->assertDatabaseHas('artists', [
            'name' => $artist->name,
        ]);
    }

    #[Test]
    public function canBeUpdated()
    {
        $artist = Artist::factory()->create();

        $this->actingAsAdmin();
        $this->put(route('admin.artists.update', $artist->id), ['name' => 'Foo Bar']);

        $this->assertDatabaseCount('artists', 1);
        $this->assertDatabaseHas('artists', [
            'name' => 'Foo Bar',
        ]);
    }

    #[Test]
    public function canBeDeleted()
    {
        $artist = Artist::factory()->create();

        $this->actingAsAdmin();
        $this->delete(route('admin.artists.destroy', $artist));

        $this->assertDatabaseCount('artists', 0);
        $this->assertDatabaseMissing('artists', [
            'name' => $artist->name,
        ]);
    }

    #[Test]
    public function imageCanBeUploaded()
    {
        Storage::fake('public');
        $artist = Artist::factory()->make();

//        dd(
//            array_merge(
//                $artist->toArray(),
//                [
//                    'image' => UploadedFile::fake()->image('image.jpg', 100, 100),
//                ],
//            )
//        );
//dd([
//            ...$artist->toArray(),
//            'image' => UploadedFile::fake()->image('image.jpg', 100, 100),
//        ]);
        $this->actingAsAdmin();
        $this->post(route('admin.artists.store'), [
            ...$artist->toArray(),
            'image' => UploadedFile::fake()->image('image.jpg', 100, 100),
        ]);

        $this->assertDatabaseCount('artists', 1);

        $artist = Artist::first();

        $this->assertNotNull($artist->image);

        Storage::disk('public')->assertExists($artist->image);
    }

    #[Test]
    public function imageCanBeUpdated()
    {
        Storage::fake('public');

        $artistImage = Storage::disk('public')->put('', UploadedFile::fake()->image('image.jpg', 100, 100));
        $artist = Artist::factory()->create([
            'image' => $artistImage
        ]);

        $this->actingAsAdmin();
        $this->put(route('admin.artists.update', $artist->id), [
            ...$artist->toArray(),
            'image' => UploadedFile::fake()->image('image2.jpg', 100, 100),
        ]);

        $artist = Artist::first();
        $this->assertNotEquals($artist->image, $artistImage);
        Storage::disk('public')->assertMissing($artistImage);
        Storage::disk('public')->assertExists($artist->image);
    }


    #[Test]
    public function imageCanBeDeleted()
    {
        Storage::fake('public');

        $artistImage = Storage::disk('public')->put('', UploadedFile::fake()->image('image.jpg', 100, 100));
        $artist = Artist::factory()->create([
            'image' => $artistImage
        ]);

        $this->actingAsAdmin();
        $this->put(route('admin.artists.update', $artist->id), [
            'name' => $artist->name,
            'removeImage' => true,
        ]);

        $artist = Artist::first();
        $this->assertNull($artist->image);
        Storage::disk('public')->assertMissing($artistImage);
    }
}
