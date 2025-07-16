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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('image_url');
        $table->string('link_url')->nullable();
        $table->enum('position', ['top', 'sidebar', 'footer']);
        $table->integer('sort_order')->default(0);
        $table->boolean('is_active')->default(true);
        $table->timestamp('starts_at')->nullable();
        $table->timestamp('ends_at')->nullable();
        $table->timestamps();
        
        $table->index(['position', 'is_active', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
