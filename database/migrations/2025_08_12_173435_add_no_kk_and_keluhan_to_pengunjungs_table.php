<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pengunjungs', function (Blueprint $table) {
        $table->string('no_kk')->after('nik')->nullable();
        $table->text('keluhan')->after('alamat')->nullable();
    });
}

public function down()
{
    Schema::table('pengunjungs', function (Blueprint $table) {
        $table->dropColumn(['no_kk', 'keluhan']);
    });
}

};
