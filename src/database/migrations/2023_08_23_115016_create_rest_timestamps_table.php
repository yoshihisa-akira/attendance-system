<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestTimestampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_timestamps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_timestamp_id')->constrained()->cascadeOnDelete();
            $table->datetime('started_at')->comment('休憩開始');
            $table->datetime('ended_at')->nullable()->comment('休憩終了');
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
        Schema::dropIfExists('rest_timestamps');
    }
}
