<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
	{
		Schema::table('visits', function (Blueprint $table) {
			
			$table->foreign('transport_id')
				->references('id')
				->on('transport_options')
				->onDelete('set null'); 
		});
	}

	public function down(): void
	{
		Schema::table('visits', function (Blueprint $table) {
			
			$table->dropForeign(['transport_id']);
		});
	}
};
