<?php

declare(strict_types=1);

use App\Models\Album;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->text('description')->nullable()->after('title');
        });

        $albums = [
            ['id' => 1, 'description' => 'A Metallica egyik legismertebb albuma, erőteljes thrash metal hangzással.'],
            ['id' => 2, 'description' => 'A Metallica második albuma, sötétebb és technikásabb hangzással.'],
            ['id' => 3, 'description' => 'A Black Sabbath klasszikusa, a heavy metal egyik alapköve.'],
            ['id' => 4, 'description' => 'Magyar metal album, lendületes és teátrális dalokkal.'],
            ['id' => 5, 'description' => 'Energikus hard rock / metal album.'],
            ['id' => 6, 'description' => 'Dio-val készült legendás Black Sabbath album.'],
            ['id' => 7, 'description' => 'Megadeth klasszikus thrash metal mesterműve.'],
            ['id' => 8, 'description' => 'Magyar metal válogatás, energikus hangzással.'],
            ['id' => 9, 'description' => 'A Judas Priest egyik legkeményebb és leggyorsabb albuma.'],
            ['id' => 10, 'description' => 'A Slayer brutális és gyors tempójú klasszikusa.'],
            ['id' => 11, 'description' => 'Magyar album háborús tematikával.'],
            ['id' => 12, 'description' => 'Az Iron Maiden ikonikus lemeze, Bruce Dickinson debütálása.'],
            ['id' => 13, 'description' => 'A Metallica legnépszerűbb albuma, himnikus dallamokkal.'],
            ['id' => 14, 'description' => 'Magyar rockballadák egy albumban.'],
            ['id' => 15, 'description' => 'Dio első szólólemeze, klasszikus heavy metal.'],
            ['id' => 16, 'description' => 'Corporate koncepcióalbum üzleti témákkal.'],
            ['id' => 18, 'description' => 'Ironikus című album technokrata világképpel.'],
        ];

        foreach ($albums as $album) {
            Album::query()->updateOrCreate(
                ['id' => $album['id']],
                ['description' => $album['description']]
            );
        }
    }
};
