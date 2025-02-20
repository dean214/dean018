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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string("inventory_name",255);
            $table->UnsignedBigInteger("quantity");
            $table->UnsignedBigInteger("category_ID");    
            $table->UnsignedBigInteger("type_ID");    
            $table->UnsignedBigInteger("size_ID");    


            $table->timestamps();

            $table->foreign("type_ID")->references("id")->on("size")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("category_ID")->references("id")->on("size")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("size_ID")->references("id")->on("size")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
