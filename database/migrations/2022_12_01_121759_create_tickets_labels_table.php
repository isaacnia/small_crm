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
        Schema::create('tickets_labels', function (Blueprint $table) {
            $table->foreignId('ticket_id')->constrained('tickets');
            $table->foreignId('label_id')->constrained('labels');
            $table->primary(['ticket_id','label_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_labels');
    }
};
