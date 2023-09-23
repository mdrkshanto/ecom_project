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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->integer('regular_price')->nullable();
            $table->integer('selling_price');
            $table->integer('stock_amount')->default(0);
            $table->integer('reorder_label')->default(0);
            $table->text('image');
            $table->integer('sales_count')->default(0);
            $table->integer('hit_count')->default(0);
            $table->enum('featured_status',[0,1])->default(0);
            $table->enum('carousel_status',[0,1])->default(0);
            $table->enum('status',[0,1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
