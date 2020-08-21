<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('intro');
            $table->string('promo1');
            $table->string('promo2');
            $table->string('promo3');
            $table->text('images');
            $table->text('review');
            $table->decimal('price', 13, 2);
            $table->integer('status');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
            $table->integer('aduser_id')->unsigned();
            $table->foreign('aduser_id')->references('id')->on('admin_users')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
