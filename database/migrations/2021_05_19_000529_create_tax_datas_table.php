<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTaxDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_datas', function (Blueprint $table) {
            $table->id();
            $table->string('email_nfe');
            $table->boolean('iss_withholding_tax');
            $table->boolean('final_costumer');
            $table->boolean('rural_producer');
            $table->integer('client_id');
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
        Schema::dropIfExists('tax_datas');
    }
}
