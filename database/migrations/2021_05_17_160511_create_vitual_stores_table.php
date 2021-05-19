<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateVitualStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitual_stores', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->float('price_of');
            $table->float('price_per');
            $table->integer('menu_id');
            $table->integer('submenu_id');
            $table->float('height');
            $table->float('depth');
            $table->float('width');
            $table->float('weight');
            $table->string('description');
            $table->string('warranty');
            $table->string('included_items');
            $table->string('specification');
            $table->boolean('featured_home');
            $table->integer('product_id');            
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
        Schema::dropIfExists('vitual_stores');
    }
}
