<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRoomPivotTable extends Migration
{
    public function up()
    {
        Schema::create('event_room', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_id_fk_5298735')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_id_fk_5298735')->references('id')->on('rooms')->onDelete('cascade');
        });
    }
}

