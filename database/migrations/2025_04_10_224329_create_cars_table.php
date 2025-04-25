<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->decimal('price',10,2);
            $table->json('car_images')->nullable();
            $table->text('description')->nullable();
            $table->boolean('sold')->default(false);
          $table->string('color');
          $table->string('country');
          $table->string('city');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->boolean('show_complaints')->default(true); // true = تعرض الشكاوي

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
