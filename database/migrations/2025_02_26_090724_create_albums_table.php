<?php

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    private static array $albums = [
        ["title" => "Master of Puppets", "artist" => "Metallica", "year" => 1986, "label" => "Elektra", "duration" => 54],
        ["title" => "Ride the Lightning", "artist" => "Metallica", "year" => 1984, "label" => "Megaforce", "duration" => 47],
        ["title" => "Paranoid", "artist" => "Black Sabbath", "year" => 1970, "label" => "Vertigo", "duration" => 41],
        ["title" => "Pokoli színjáték", "artist" => "Pokolgép", "year" => 1987, "label" => "Hungaroton", "duration" => 42],
        ["title" => "Nomad", "artist" => "Ektomorf", "year" => 2004, "label" => "Nuclear Blast", "duration" => 40],
        ["title" => "Heaven and Hell", "artist" => "Black Sabbath", "year" => 1980, "label" => "Vertigo", "duration" => 37],
        ["title" => "Rust in Peace", "artist" => "Megadeth", "year" => 1990, "label" => "Capitol", "duration" => 40],
        ["title" => "Metálbomba", "artist" => "Kalapács", "year" => 2002, "label" => "Hammer", "duration" => 46],
        ["title" => "Painkiller", "artist" => "Judas Priest", "year" => 1990, "label" => "Columbia", "duration" => 46],
        ["title" => "Reign in Blood", "artist" => "Slayer", "year" => 1986, "label" => "Def Jam", "duration" => 29],
        ["title" => "A háború gyermeke", "artist" => "Pokolgép", "year" => 1990, "label" => "Favorit", "duration" => 43],
        ["title" => "The Number of the Beast", "artist" => "Iron Maiden", "year" => 1982, "label" => "EMI", "duration" => 40],
        ["title" => "Metallica (Black Album)", "artist" => "Metallica", "year" => 1991, "label" => "Elektra", "duration" => 62],
        ["title" => "Az ígéret földje", "artist" => "Dalriada", "year" => 2009, "label" => "Hammer", "duration" => 50],
        ["title" => "Holy Diver", "artist" => "Dio", "year" => 1983, "label" => "Warner Bros.", "duration" => 41],
    ];

    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(Artist::class)->constrained();
            $table->unsignedSmallInteger('year');
            $table->string('label');
            $table->unsignedSmallInteger('duration');
            $table->timestamps();
        });

        collect(self::$albums)
            ->pluck('artist')
            ->unique()
            ->each(fn(string $artist) => Artist::query()->create(['name' => $artist]));
        $artists = Artist::query()->pluck('id', 'name');

        collect(self::$albums)
            ->each(function (array $album) use ($artists) {
                return Album::query()->create([
                    'title' => $album['title'],
                    'artist_id' => $artists[$album['artist']],
                    'year' => $album['year'],
                    'label' => $album['label'],
                    'duration' => $album['duration'],
                ]);
            });
    }
};
