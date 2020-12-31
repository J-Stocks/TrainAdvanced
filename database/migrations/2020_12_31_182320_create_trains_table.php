<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->text('make');
            $table->text('model');
            $table->date('production_start');
            $table->date('production_end');
            $table->text('description');
            $table->integer('editor_id');
            $table->timestamps();
            $table->unique(['make', 'model']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('trains');
    }
}
