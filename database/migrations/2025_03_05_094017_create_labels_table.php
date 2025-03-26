<?php

use App\Models\Album;
use App\Models\Label;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Album::query()
            ->pluck('label')
            ->unique()
            ->each(fn (string $label) => Label::query()->create(['name' => $label]));

        $labels = Label::query()->pluck('id', 'name')->toArray();

        Schema::table('albums', function (Blueprint $table) {
            $table->foreignIdFor(Label::class)->nullable()->after('artist_id')->constrained();
        });

        Album::query()
            ->each(fn (Album $album) => $album->update(['label_id' => $labels[$album->label]]));

        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('label');
        });
    }
};
