<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSkusTable extends Migration
{
    public function up()
    {
        Schema::create('product_skus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->decimal('price', 10, 2, true);
            $table->unsignedInteger('stock');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_skus');
    }
}
