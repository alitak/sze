<?php

use App\Models\Artist;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
//            $table->string('artist');
//            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Artist::class)->constrained();
            $table->unsignedSmallInteger('year');
            $table->string('label');
            $table->unsignedSmallInteger('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
