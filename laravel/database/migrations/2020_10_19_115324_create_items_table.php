<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	public function up() {
		Schema::create('items', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255)->nullable();
			$table->string('body', 255)->nullable();
			$table->unsignedInteger('price')->nullable();
			$table->unsignedInteger('stock')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down() {
		Schema::dropIfExists('items');
	}
}
