<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViesVatTable extends Migration
{
    private $tableName = 'vies_vat';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_code', 2);
            $table->string('vat_number', 50)->unique();
            $table->unsignedInteger('request_time');
            $table->string('trader_name', 191)->nullable();
            $table->string('trader_company_type', 191)->nullable();
            $table->string('trader_street', 191)->nullable();
            $table->string('trader_post_code', 191)->nullable();
            $table->string('trader_city', 191)->nullable();
            $table->string('identifier', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}