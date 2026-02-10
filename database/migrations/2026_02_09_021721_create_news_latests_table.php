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
        Schema::create('news_latests', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->text('description_en');

            $table->string('title_kh')->nullable();
            $table->text('description_kh')->nullable();

            $table->string('title_cn')->nullable();
            $table->text('description_cn')->nullable();
            $table->json('images');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_latests');
    }
};
