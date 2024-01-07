<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeatureToSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sectiontitles', function (Blueprint $table) {
            $table->string('feature_first_title')->nullable();
            $table->text('feature_first_subtitle')->nullable();
            $table->string('feature_first_image')->nullable();
            $table->string('feature_second_title')->nullable();
            $table->text('feature_second_subtitle')->nullable();
            $table->string('feature_second_image')->nullable();
            $table->string('feature_third_title')->nullable();
            $table->text('feature_third_subtitle')->nullable();
            $table->string('feature_third_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['feature_first_title','feature_first_subtitle','feature_first_image']);
            $table->dropColumn(['feature_second_title','feature_second_subtitle','feature_second_image']);
            $table->dropColumn(['feature_third_title','feature_third_subtitle','feature_third_image']);
        });
    }
}
