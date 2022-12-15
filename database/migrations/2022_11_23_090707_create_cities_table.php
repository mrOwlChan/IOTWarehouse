<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Attribute yang ditambahkan
            $table->string('city_id')->nullable();
            $table->string('name')->nullable();
            $table->enum('type', ['kabupaten', 'kota'])->default('kota');
            $table->string('postal_code')->nullable();
            $table->string('province_code')->nullable();
            $table->boolean('enable_status')->default(true);
            
            // Foreign Key
            $table->foreignId('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
