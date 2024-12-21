<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->integer('quantity')->default(1);
            $table->date('rental_start_date');
            $table->date('rental_end_date'); // Rental end date
            $table->string('product_image')->nullable();
            $table->decimal('total_price', 10, 2)->nullable(false);
            $table->string('status')->default('pending'); // Status of cart item
            $table->timestamps(); // created_at and updated_at

            // Define foreign key relationships
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
