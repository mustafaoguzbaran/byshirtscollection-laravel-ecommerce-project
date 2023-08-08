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
            $table->string("name");
            $table->text("description")->nullable();
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->decimal("price", 10, 2);
            $table->integer("stock_quantity");
            $table->unsignedBigInteger("color_id")->nullable();
            $table->foreign("color_id")->references("id")->on("colors")->onDelete("set null");
            $table->string("featured_image")->nullable();
            $table->boolean("is_featured")->default(false);
            $table->string("slug");
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
