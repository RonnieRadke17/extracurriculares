<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->nullable();
            $table->string('description', 90)->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->integer('ability')->nullable();
                        
            $table->unsignedBigInteger('place_id');
            $table->unsignedBigInteger('extracurricular_id');
            $table->unsignedBigInteger('event_type_id');
            $table->enum('status',['A','NA','Canceled',])->nullable()->default('A');
            $table->unsignedBigInteger('user_id');

            

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('extracurricular_id')->references('id')->on('extracurriculars')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
