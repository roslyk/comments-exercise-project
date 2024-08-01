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
        Schema::create('posts'/* Name of table to be created */,
        function (Blueprint $table) {
            $table->id();
            // When a user is deleted
            // the user's posts are also deleted
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // When a category is deleted then
            // this category's posts are also deleted
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('excerpt');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
