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
        });
        DB::statement("ALTER TABLE images_db ADD image LONGBLOB");
        DB::statement("ALTER TABLE images_db ADD compressed_image LONGBLOB");
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
