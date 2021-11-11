<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->datetime('start_day')->nullable();
            $table->datetime('end_day')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('partition_email')->nullable();
            $table->longText('description')->nullable();
            $table->longText('note')->nullable();
            $table->longText('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
