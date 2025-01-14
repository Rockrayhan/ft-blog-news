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
        Schema::create('topbar_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Path to the banner image
            $table->string('link')->nullable(); // Optional link for the banner
            $table->boolean('is_active')->default(true); // Whether the banner is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topbar_banners');
    }
};
