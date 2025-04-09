<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->index('title');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->index('name');
        });
        Schema::table('labels', function (Blueprint $table) {
            $table->index('name');
        });
    }
};
