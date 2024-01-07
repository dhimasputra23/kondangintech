<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientsToSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sectiontitles', function (Blueprint $table) {
            $table->string('clients_title')->nullable();
            $table->text('clients_subtitle')->nullable();
            $table->string('clients_image')->nullable();
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
            $table->dropColumn(['clients_title','clients_subtitle','clients_image']);
        });
    }
}
