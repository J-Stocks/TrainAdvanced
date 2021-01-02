<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageUrlToTrainsTable extends Migration
{
    public function up()
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->string('image_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
}
