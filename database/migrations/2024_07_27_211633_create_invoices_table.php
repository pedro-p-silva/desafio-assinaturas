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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register');
            $table->foreign('register')->references('id')->on('users');
            $table->unsignedBigInteger('signature');
            $table->foreign('signature')->references('id')->on('signatures');
            $table->string('description', 200)->nullable();
            $table->date('due_date');
            $table->decimal('price',15,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
