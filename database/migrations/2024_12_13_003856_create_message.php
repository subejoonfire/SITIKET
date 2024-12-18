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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idticket')->nullable()->default(NULL);
            $table->unsignedBigInteger('iduser_from')->nullable()->default(NULL);
            $table->unsignedBigInteger('iduser_to')->nullable()->default(NULL);
            $table->boolean('read_user')->default(false);
            $table->boolean('read_pic')->default(false);
            $table->longText('message');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};