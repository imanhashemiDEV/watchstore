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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('slug',255)->unique();
            $table->integer('price')->default(0);
            $table->integer('review')->default(0);
            $table->integer('count')->default(0);
            $table->string('image')->nullable();
            $table->string('guaranty')->nullable();
            $table->integer('discount')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_special')->default(false);
            $table->timestamp('special_expiration')->nullable();
            $table->string('status')->default(\App\Enums\ProductStatus::Active->value);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete()->cascadeOnUpdate();
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
};
