<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('category');
            $table->string('abstract');
            $table->string('etat');
            $table->integer('nbrfigure');
            $table->string('authorId');
            $table->string('editorId');
            $table->string('reviewer1Id');
            $table->string('reviewer2Id');
            $table->integer('nbrpage');

        });

        DB::statement("ALTER TABLE article ADD obj_pdf  MEDIUMBLOB");
        DB::statement("ALTER TABLE article ADD pic  MEDIUMBLOB");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

