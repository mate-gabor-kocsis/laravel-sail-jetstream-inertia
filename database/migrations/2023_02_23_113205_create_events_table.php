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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title',64);
            $table->date("start_date");
            $table->date("end_date");
            $table->timestamps();
        });

        Schema::table("events", function (Blueprint $table) {
            $table
                ->unsignedBigInteger("created_by")
                ->nullable()
                ->after("created_at");
            $table
                ->unsignedBigInteger("updated_by")
                ->nullable()
                ->after("updated_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
