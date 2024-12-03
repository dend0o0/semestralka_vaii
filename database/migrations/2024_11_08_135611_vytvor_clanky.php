<?php

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
        Schema::create('clanky', function (Blueprint $table) {
            $table->id();
            $table->string('nazov');
            $table->string('lat_nazov');
            $table->integer('min_teplota');
            $table->integer('max_teplota');
            $table->text('obsah');
            $table->string('obrazok');
            $table->foreignIdFor(\App\Models\Category::class);
            $table->boolean('kvitnuca');
            $table->foreignIdFor(\App\Models\User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('clanky');
    }
};
