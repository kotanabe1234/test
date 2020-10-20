<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnImageColumn extends Migration {

    public function up() {
        Schema::table('items', function (Blueprint $table) {
		    $table->dropColumn('image');
        });
    }

    public function down() {
        Schema::table('items', function (Blueprint $table) {
		    $table->string('image')->nullable()->after('stock');
        });
    }
}
