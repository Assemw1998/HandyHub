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
        Schema::create('background_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_url')->nullable();
            $table->string('background_image_title');
            $table->string('background_image_description');
            $table->integer('created_by')->default(NULL);
            $table->integer('updated_by')->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('background_images');
    }
};
