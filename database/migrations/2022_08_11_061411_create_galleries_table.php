<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('album_id')->unsigned()->index();
            $table->foreign('album_id')
                ->references('id')
                ->on('albums')
                ->onDelete('cascade');
            $table->string('title', 100)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('galleries');
    }
}
