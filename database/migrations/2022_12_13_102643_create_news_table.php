<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['Notice', 'News']);
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('content_writer')->nullable();
            $table->string('place')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_published')->default(false);
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
        Schema::dropIfExists('news');
    }
}
