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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticketcode')->unique();
            $table->unsignedBigInteger('iddepartment')->nullable()->default(NULL);
            $table->unsignedBigInteger('iduser')->nullable()->default(NULL);
            $table->unsignedBigInteger('iduser_pic')->nullable()->default(NULL);
            $table->string('status')->default('TERKIRIM');
            $table->string('issue');
            $table->text('detailissue');
            $table->string('priority')->nullable()->default(NULL);
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
