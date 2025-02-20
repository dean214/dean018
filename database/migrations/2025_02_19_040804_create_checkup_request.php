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
        Schema::create('checkup_request', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger("checkup_desc_id");
            $table->string("inventory_item_name",255);
            $table->Integer("quantity");
            $table->UnsignedBigInteger("mech_acc_id");
            $table->enum("status",["Pending","HandOver"]);
            $table->date("request_date");
            $table->UnsignedBigInteger("size_id");
            $table->UnsignedBigInteger("type_id");








            $table->timestamps();

         
            $table->foreign("checkup_desc_id")->references("id")->on("checkup_checkupdesc")->ondelete("cascade")->onUpdate("cascade");
            $table->foreign("mech_acc_id")->references("id")->on("mech_acc")->ondelete("cascade")->onUpdate("cascade");
            $table->foreign("size_id")->references("id")->on("size")->ondelete("cascade")->onUpdate("cascade");
            $table->foreign("type_id")->references("id")->on("type")->ondelete("cascade")->onUpdate("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkup_request');
    }
};
