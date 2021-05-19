<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf_cnpj');
            $table->string('rg_ie');
            $table->string('email');
            $table->string('phone');
            $table->enum('type', ['physical_person', 'legal_person'])->nullable();
            $table->string('surname')->nullable();
            $table->string('rg_emitter')->nullable();
            $table->string('rg_uf')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('site')->nullable();
            $table->string('observation')->nullable();
            $table->float('credit_limit')->nullable();
            $table->string('company_name')->nullable();
            $table->string('fantasy_name')->nullable();
            $table->string('state_registration')->nullable();
            $table->string('municipal_registration')->nullable();
            $table->integer('destination_IE_tax_id')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
