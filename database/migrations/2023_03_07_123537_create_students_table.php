<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('indexNumber')->unique();
            $table->string('name');
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('alternative_email')->nullable();
            $table->string('address')->nullable();
            $table->string('post_code')->nullable();
            $table->string('town')->nullable();
            $table->string('program_code');
            $table->string('program');
            $table->string('secondary_school')->nullable();
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
        Schema::dropIfExists('students');
    }
};
