<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function(Blueprint $table) {
            $table->dropForeign('entry_cart_id_foreign');
            $table->dropColumn('cart_id');

            $table->dropForeign('entry_product_id_foreign');
            $table->dropColumn('product_id');

            //$table->integer('cart_id')->unsigned()->nullable();
            //$table->foreign('cart_id')->references('id')->on('carts');
            //$table->integer('product_id')->unsigned()->nullable();
            //$table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
