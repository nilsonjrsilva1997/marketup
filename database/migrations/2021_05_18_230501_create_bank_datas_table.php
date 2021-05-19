<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBankDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_datas', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id');
            $table->string('agency');
            $table->string('agency_digit');
            $table->string('account');
            $table->string('account_digit');
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
        Schema::dropIfExists('bank_datas');
    }
}
