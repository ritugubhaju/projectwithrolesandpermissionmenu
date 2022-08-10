<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_sub_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_menu_id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->text('url')->nullable();
            $table->integer('order')->nullable();
            $table->foreign('sub_menu_id')->references('id')->on('sub_menus')->onDelete('cascade');
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
        Schema::dropIfExists('child_sub_menus');
    }
}
