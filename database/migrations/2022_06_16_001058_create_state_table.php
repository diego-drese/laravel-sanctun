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
        Schema::create('state', function (Blueprint $table) {
			$table->tinyInteger('id', true ,true);
			$table->string('name')->index();
			$table->string('uf')->index();
			$table->smallInteger('ibge')->index();
			$table->smallInteger('pais')->index();
			$table->string('ddd')->index();
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
        Schema::dropIfExists('state');
    }
};
