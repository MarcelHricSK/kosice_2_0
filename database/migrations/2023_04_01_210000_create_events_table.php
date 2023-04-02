<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poi_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamp('datetime');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('poi_id')->references('id')->on('pois')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
