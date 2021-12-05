<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers');

            $table->string('name')->unique();
            $table->string('description')->nullable();

            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();

            

            $table->string('position');
            $table->string('reference');
            
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('INACTIVE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
