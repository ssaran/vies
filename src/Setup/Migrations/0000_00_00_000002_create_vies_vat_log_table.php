<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViesVatLogTable extends Migration
{
    private $tableName = 'vies_vat_log';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vies_vat_id')->nullable();
            $table->string('country_code', 2);
            $table->string('vat_number', 50);
            $table->string('ip', 50);
            $table->text('response');
            $table->unsignedInteger('request_time');
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