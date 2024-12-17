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
        Schema::create('users_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser_pic')->nullable()->default(NULL);
            $table->unsignedBigInteger('iduser')->nullable()->default(NULL);
            $table->unsignedBigInteger('idticket')->nullable()->default(NULL);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userstickets');
    }
};