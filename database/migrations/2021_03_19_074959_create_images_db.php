<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateImagesDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_db', function (Blueprint $table) {
            $table->id();
            $table->string("tags");
            $table->integer("downloaded_times")->default(0);
        });
        DB::statement("ALTER TABLE images_db ADD image MEDIUMBLOB UNIQUE");
        DB::statement("ALTER TABLE images_db ADD compressed_image MEDIUMBLOB UNIQUE");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_db');
    }
}
