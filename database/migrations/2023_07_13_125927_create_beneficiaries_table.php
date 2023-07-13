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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();
            $table->string('spouse_name',255)->nullable();
            $table->string('nid',255)->nullable();
            $table->string('bid',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('dob',255)->nullable();
            $table->string('gender',255)->nullable();
            $table->string('age',255)->nullable();
            $table->string('mobile',255)->nullable();
            $table->string('wordno',255)->nullable();
            $table->string('union',255)->nullable();
            $table->string('upazila',255)->nullable();
            $table->string('district',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('marital_status',255)->nullable();
            $table->string('family_member',255)->nullable();
            $table->longText('about')->nullable();
            $table->longText('description')->nullable();
            $table->string('count',255)->nullable();
            $table->double('total_amount',10,2)->nullable();
            $table->string('slug',255)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('beneficiaries');
    }
};
