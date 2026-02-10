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
        Schema::create('our_team', function (Blueprint $table) {
            $table->id();

            $table->string('name_en');
            $table->string('position_en');

            $table->string('name_kh');
            $table->string('position_kh');

            $table->string('name_cn');
            $table->string('position_cn');

            $table->string('profile'); // image path

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_team');
    }
};
