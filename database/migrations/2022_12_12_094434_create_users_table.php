<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Attribute yang ditambahkan
            $table->boolean('enable_status')->default(true);
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('address_street')->nullable();

            // Foreign Key
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('job_position_id')->references('id')->on('job_positions');
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
        Schema::dropIfExists('users');

        // Hapus direktori users
        Storage::deleteDirectory('users');
    }
}
