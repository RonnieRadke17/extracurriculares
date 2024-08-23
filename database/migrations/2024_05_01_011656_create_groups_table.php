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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_name_id');
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('extracurricular_id');
            $table->unsignedBigInteger('user_id');           
            
            $table->enum('status', ['A', 'NA'])->nullable()->default('A');
            
            $table->foreign('group_name_id')->references('id')->on('group_names')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('extracurricular_id')->references('id')->on('extracurriculars')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
