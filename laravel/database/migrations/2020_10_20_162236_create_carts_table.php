<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration {

	public function up() {
		Schema::create('carts', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id')->nullable();
			$table->unsignedInteger('item_id')->nullable();
			$table->unsignedInteger('qty')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down() {
		Schema::dropIfExists('carts');
	}
}
