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
        Schema::create('job_desc', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger("cars_ID");
            $table->UnsignedBigInteger("mech_acc_ID");
            $table->string("Engine_truoble");
            $table->string("Change_oil");
            $table->string("UnderChasis_Truoble");
            $table->string("mech_assign",255);
            $table->string("plate_number",20);
            $table->string("brand",20);
            $table->string("model",50);
            $table->timestamps();

            $table->foreign("cars_ID")->references("id")->on("cars")->onDelete("cascade")->onUpdate("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_desc');
    }
};
