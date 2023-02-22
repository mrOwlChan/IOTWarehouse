<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 
            $table->boolean('enable_status')->default(true);
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('address_street')->nullable();
            $table->text('desc')->nullable();
            $table->string('logo')->nullable();

            // Foreign Key
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('comp_sector_id')->references('id')->on('comp_sectors');
            $table->foreignId('subdistrict_id')->references('id')->on('subdistricts');
            $table->foreignId('urban_village_id')->references('id')->on('urban_villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
