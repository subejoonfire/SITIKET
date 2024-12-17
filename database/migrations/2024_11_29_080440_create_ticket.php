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
            $table->unsignedBigInteger('iduser')->nullable()->default(NULL);
            $table->unsignedBigInteger('idmodule')->nullable()->default(NULL);
            $table->unsignedBigInteger('idpriority')->nullable()->default(NULL);
            $table->unsignedBigInteger('idcategory')->nullable()->default(NULL);
            $table->string('ticketcode')->unique();
            $table->string('status')->default('TERKIRIM');
            $table->string('issue');
            $table->text('detailissue');
            $table->string('priority')->nullable()->default(NULL);
            $table->timestamps();
            $table->softDeletes();
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
