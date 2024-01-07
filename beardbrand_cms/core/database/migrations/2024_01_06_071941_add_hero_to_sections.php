<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeroToSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sectiontitles', function (Blueprint $table) {
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->dropColumn(['hero_title','hero_subtitle','hero_image']);
        });
    }
}
