<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrbanVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urban_villages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //  Attribut yang ditambahkan 
            $table->string('enable_status')->default(true);
            $table->string('name')->nullable();
            $table->string('urban_village_code')->nullable();

            // Foreign Key
            $table->foreignId('subdistrict_id')->references('id')->on('subdistricts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urban_villages');
    }
}
