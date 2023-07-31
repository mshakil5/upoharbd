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
        Schema::create('humanitarian_aids', function (Blueprint $table) {
            $table->id();
            $table->string('date',191)->nullable();
            $table->string('title',191)->nullable();
            $table->string('category',191)->nullable();
            $table->longText('comment')->nullable();
            $table->string('document',255)->nullable();
            $table->boolean('notification')->default(0);
            $table->boolean('approve')->default(0);
            $table->boolean('status')->default(0);
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('humanitarian_aids');
    }
};
