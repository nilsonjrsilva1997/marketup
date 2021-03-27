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
            $table->string('bar_code');
            $table->enum('status', ['ACTIVE', 'DISABLED']);
            $table->string('description');
            $table->integer('item_type_id');
            $table->integer('unity_id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('balance_code');
            $table->integer('brand_id');
            $table->string('model');
            $table->string('internal_code');
            $table->string('photo');
            $table->integer('user_id');
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
