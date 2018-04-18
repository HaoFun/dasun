<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('config_name');
            $table->string('config_phone')->nullable();
            $table->string('config_address')->nullable();
            $table->string('config_email')->nullable();
            $table->string('config_fax')->nullable();
            $table->string('config_house')->nullable();
            $table->text('config_info')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('config_image')->nullable();
            $table->string('config_image_title')->nullable();
            $table->text('config_ad_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
