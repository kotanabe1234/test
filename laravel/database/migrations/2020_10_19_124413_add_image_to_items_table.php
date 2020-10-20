<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToItemsTable extends Migration {

    public function up() {
        Schema::table('items', function (Blueprint $table) {
		    $table->string('image')->nullable()->after('stock');
        });
    }

    public function down() {
        Schema::table('items', function (Blueprint $table) {
		    $table->dropColumn('image');
        });
    }
}
