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
        Schema::create('listings', function (Blueprint $table) {
             $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('thumbnail');
            $table->enum('type', ['Private Room','Shared Room','Apartment']);
            $table->enum('gender', ['Male','Female'])->nullable();
            $table->date('availability')->nullable();
            $table->string('duration')->nullable();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
