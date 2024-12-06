<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('name_en')->nullable();
            $table->string('name_ar');
            $table->text('description_en')->nullable();
            $table->text('description_ar');
            $table->string('image')->nullable(); 
            $table->decimal('price', 8, 2);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}