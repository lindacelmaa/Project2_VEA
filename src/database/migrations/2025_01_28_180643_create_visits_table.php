<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
        $table->id();
        $table->foreignId('leader_id');
        $table->string('destination_country', 256);
        $table->string('event_name', 256); 
        $table->date('start_date');
        $table->date('end_date'); 
        $table->text('description')->nullable(); 
        $table->decimal('cost', 10, 2)->nullable(); 
        $table->timestamps();
		$table->boolean('display');
		$table->string('image', 256)->nullable();
        $table->foreign('leader_id')->references('id')->on('leaders');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
