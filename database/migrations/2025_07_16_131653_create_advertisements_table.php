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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('description');
        $table->decimal('price', 10, 2)->nullable();
        $table->string('currency', 3)->default('PLN');
        $table->string('contact_name');
        $table->string('contact_email');
        $table->string('contact_phone')->nullable();
        $table->string('location');
        $table->json('images')->nullable();
        $table->unsignedBigInteger('category_id');
        $table->enum('status', ['pending', 'active', 'expired', 'rejected'])->default('pending');
        $table->boolean('is_featured')->default(false);
        $table->timestamp('expires_at')->nullable();
        $table->timestamps();
        
        $table->foreign('category_id')->references('id')->on('categories');
        $table->index(['status', 'created_at']);
        $table->index(['category_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
