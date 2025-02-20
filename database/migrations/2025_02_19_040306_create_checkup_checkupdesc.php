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
        Schema::create('checkup_checkupdesc', function (Blueprint $table) {
            $table->id();
            $table->string("ChangeOil");
            $table->string("UnderChassis");
            $table->UnsignedBigInteger("cars_ID");
            $table->UnsignedBigInteger("mech_acc_ID");
            $table->string("mech_assign",255); 
            $table->string("plate_number",255);
            $table->string("Brand",255); 
            $table->string("Model",255); 


             $table->foreign("cars_ID")->references("id")->on("cars")->onDelete("cascade")->onUpdate("cascade");
             $table->foreign("mech_acc_ID")->references("id")->on("mech_acc")->onDelete("cascade")->onUpdate("cascade");







            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkup_checkupdesc');
    }
};
