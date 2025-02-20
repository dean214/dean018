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
        Schema::create('job_list', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger("job_desc_id");
            $table->UnsignedBigInteger("mech_acc_ID");
            $table->enum("status",["pending","InProgress","completed"]);
            $table->date("date_assigned");
            $table->date("date_started");
            $table->date("date_done");
            $table->timestamps();

            $table->foreign("job_desc_id")->references("id")->on("job_desc")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("mech_acc_ID")->references("id")->on("mech_acc")->onDelete("cascade")->onUpdate("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_list');
    }
};
