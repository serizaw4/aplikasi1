<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemesanan')->constrained('pemesanans');
            $table->foreignId('id_menu')->constrained('menus');
            $table->timestamps();
        });

        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropForeign('pemesanans_id_menu_foreign');
        });

        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropColumn('id_menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan_details');
    }
}
