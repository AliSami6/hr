<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactTitleToFrontSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('front_settings', function (Blueprint $table) {
            $table->string('contact_title')->nullable()->after('contact_email');
            $table->string('contact_subtitle')->nullable()->after('contact_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('front_settings', function (Blueprint $table) {
            //
        });
    }
}