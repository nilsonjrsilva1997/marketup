<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateAddressClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_clients', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code');
            $table->string('road');
            $table->integer('number');
            $table->string('complement');
            $table->string('district');
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
        Schema::dropIfExists('address_clients');
    }
}
