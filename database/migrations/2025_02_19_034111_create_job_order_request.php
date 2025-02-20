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
        Schema::create('job_order_request', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger("job_desc_id");
            $table->string("inventory_item_name",255);
            $table->UnsignedBigInteger("quantity");
            $table->UnsignedBigInteger("mech_acc_id");
            $table->enum("status",["pending","Handover"]);
            $table->date("request_date");
            $table->UnsignedBigInteger("size_ID");
            $table->UnsignedBigInteger("type_ID");
            $table->timestamps();

            $table->foreign("job_desc_id")->references("id")->on("job_desc")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("mech_acc_id")->references("id")->on("mech_acc")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("size_ID")->references("id")->on("size")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("type_ID")->references("id")->on("type")->onDelete("cascade")->onUpdate("cascade");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_order_request');
    }
};
