<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('product_review');
		Schema::dropIfExists('shop_review');
		Schema::dropIfExists('product_group');
		Schema::dropIfExists('subgroup');
		Schema::dropIfExists('product_filter');
		Schema::dropIfExists('filter_list');
		Schema::dropIfExists('products');
		Schema::dropIfExists('department');
		Schema::dropIfExists('shop');
		Schema::dropIfExists('users');
		Schema::dropIfExists('city');

		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password', 60)->nullable();
			$table->string('name', 200);
			$table->string('gender',10)->nullable();
			$table->string('city', 100)->nullable();
			$table->string('type',100)->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('fbid',20)->nullable();
			$table->text('address')->nullable();
			$table->float('lat')->nullable();
			$table->float('long')->nullable();
			$table->timestamps();
			$table->rememberToken();
		});
			
		Schema::create('shop', function(Blueprint $table)
		{
			$table->increments('shop_id');
			$table->string('name',200);
			$table->integer('id')->unsigned();
			$table->foreign('id')->references('id')->on('users')->onDelete('cascade');
			$table->string('img',500)->nullable();
			$table->text('address')->nullable();
			$table->string('city', 100)->nullable();
			$table->string('phone',100)->nullable();
			$table->float('lat')->nullable();
			$table->float('long')->nullable();
			$table->timestamps();
		});

		Schema::create('department', function(Blueprint $table)
		{
			$table->string('department',200);
			$table->primary('department');
			$table->timestamps();

		});

		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('product_id');
			$table->string('name',200);
			$table->integer('shop_id')->unsigned();
			$table->foreign('shop_id')->references('shop_id')->on('shop')->onDelete('cascade');
			$table->text('description')->nullable();
			$table->text('exchange_policy')->nullable();
			$table->text('warranty_details')->nullable();
			$table->integer('price')->nullable();
			$table->integer('quantity')->default(0);
			$table->string('department',200);
			$table->foreign('department')->references('department')->on('department')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('filter_list', function(Blueprint $table)
		{
			$table->increments('filter_id');
			$table->string('filter_name',200);
			$table->string('department',200);
			$table->foreign('department')->references('department')->on('department')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('product_filter', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
			$table->integer('filter_id')->unsigned();
			$table->foreign('filter_id')->references('filter_id')->on('filter_list')->onDelete('cascade');
			$table->string('value',200);
			$table->timestamps();
		});

		Schema::create('subgroup', function(Blueprint $table)
		{
			$table->increments('sub_id');
			$table->string('sub_name',200);
			$table->string('sub_type',200);
			$table->string('department',200);
			$table->foreign('department')->references('department')->on('department')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('product_group', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
			$table->integer('sub_id')->unsigned();
			$table->foreign('sub_id')->references('sub_id')->on('subgroup')->onDelete('cascade');
			$table->integer('value')->default(0);
			$table->timestamps();
		});


		Schema::create('product_review', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
			$table->integer('id')->unsigned();
			$table->foreign('id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('rate')->defualt(0);
			$table->text('remarks');
			$table->timestamps();
		});

		Schema::create('shop_review', function(Blueprint $table)
		{
			$table->integer('shop_id')->unsigned();
			$table->foreign('shop_id')->references('shop_id')->on('shop')->onDelete('cascade');
			$table->integer('id')->unsigned();
			$table->foreign('id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('rate')->defualt(0);
			$table->text('remarks');
			$table->timestamps();
		});

		Schema::create('city', function(Blueprint $table)
		{
			$table->string('name',100);
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
		//
	}

}
