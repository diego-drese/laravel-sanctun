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
        Schema::create('city', function (Blueprint $table) {
			$table->smallInteger('id', true, true);
			$table->string('name', 191)->nullable();
			$table->tinyInteger('capital')->default(0);
			$table->smallInteger('metropolitan_region')->default(0);
			$table->tinyInteger('state_id')->index();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('city');
    }
};
