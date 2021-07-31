<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Constants\DBTablesConstants;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title', DBTablesConstants::ADVERTISEMENTS_TABLE_MAX_LENGTHS['title']);
            $table->string('description', DBTablesConstants::ADVERTISEMENTS_TABLE_MAX_LENGTHS['description']);
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
        Schema::dropIfExists('advertisements');
    }
}
