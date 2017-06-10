<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('cat_id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->text('pro_des');
            $table->longText('pro_content');
            $table->integer('pro_price');
            $table->string('pro_img');
            $table->string('pro_phukien');
            $table->string('pro_baohanh');
            $table->string('pro_khuyenmai');
            $table->integer('pro_trangthai');
            $table->string('pro_tinhtrang');
            $table->integer('pro_noibat');
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
