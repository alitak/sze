<?php

declare(strict_types=1);

namespace Tests\Admin;

use App\Models\Artist;
use App\Models\User;
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

//    #[Test]
//    public function imageCanBeUploaded()
//    {
//
//    }

}
