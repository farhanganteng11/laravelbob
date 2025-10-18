<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');  
            $table->string('unit');          
            $table->string('type');         
            $table->text('information')->nullable(); 
            $table->integer('qty');          
            $table->string('producer');      
            $table->timestamps();            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
