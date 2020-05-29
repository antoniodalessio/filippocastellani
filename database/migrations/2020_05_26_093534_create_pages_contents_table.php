<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id');
            $table->integer('lang_id');
            $table->string('slug');
            $table->string('title');
            $table->string('subtitle');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('content');
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
        Schema::dropIfExists('pages_contents');
    }
}
