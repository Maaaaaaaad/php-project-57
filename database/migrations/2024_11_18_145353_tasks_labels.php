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
        Schema::create('tasks_labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tasks_id');
            $table->foreign('tasks_id')->references('id')->on('tasks');
            $table->unsignedBigInteger('labels_id');
            $table->foreign('labels_id')->references('id')->on('labels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
