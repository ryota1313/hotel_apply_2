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
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('phone_number', 15)->change();  // 🔹 文字列型に変更
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->integer('phone_number')->change();  // 🔹 元に戻す
    });
}

};
