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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('help_type_id')->unsigned()->nullable();
            $table->foreign('help_type_id')->references('id')->on('help_types')->onDelete('cascade');
            $table->bigInteger('beneficiary_id')->unsigned()->nullable();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
            $table->string('date',191)->nullable();
            $table->double('amount',10,2)->nullable();
            $table->longText('comment')->nullable();
            $table->string('sign',191)->nullable();
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
        Schema::dropIfExists('donations');
    }
};
