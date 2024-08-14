<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripAssociateTable extends Migration
{
    public function up()
    {
        Schema::create('trip_associate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idtrips')->constrained('trips')->onDelete('cascade');
            $table->foreignId('idassociates')->constrained('associates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trip_associate');
    }
};
