<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->enum('role', ['admin', 'system_admin', 'user']);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('code')->nullable();
            $table->timestamp('time_code')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->integer('view')->nullable();
            $table->longText('description');
            $table->longText('content');
            $table->enum('status', ['active', 'inactive']);
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->enum('status', ['active', 'inactive']);
            $table->softDeletes();
            $table->timestamps();;
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->string('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('attribute_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        });

        Schema::create('category_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('attribute_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_full')->nullable();
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('price');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->tinyInteger('sale');
            $table->enum('status', ['active', 'inactive']);
            $table->enum('hot', ['yes', 'no']);
            $table->longText('content');
            $table->string('image');
            $table->integer('qty_pay')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('number_of_reviewers')->nullable();
            $table->integer('total_star')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('product_image', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->unsignedBigInteger('product_id');
           $table->string('image');
           $table->integer('index');
           $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::create('product_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_value_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attribute_value_id')->references('id')->on('attribute_value')->onDelete('cascade');
        });

        Schema::create('favorite_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('coupons', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->unsignedBigInteger('category_id');
           $table->string('code');
           $table->integer('sale');
           $table->timestamp('expire_date')->nullable();
           $table->timestamps();
           $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::create('notification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sender');
            $table->integer('receiver');
            $table->string('content');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name');
            $table->bigInteger('total');
            $table->string('note');
            $table->string('address');
            $table->string('phone');
            $table->enum('status',['pending', 'processing', 'completed', 'canceled']);
            $table->enum('type_payment', ['vnpay', 'momo', 'normal'])->nullable();
            $table->string('status_payment')->nullable();
            $table->string('payment_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->bigInteger('price');
            $table->integer('sale');
            $table->string('payment_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::create('ratings', function(Blueprint  $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->integer('number');
            $table->string('content');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image');
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_history', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->unsignedBigInteger('product_id');
           $table->integer('number_import')->nullable();
           $table->integer('number_export')->nullable();
           $table->timestamp('time_import')->nullable();
           $table->timestamp('time_export')->nullable();
           $table->timestamps();
           $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('ratings');
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('product_image');
        Schema::dropIfExists('product_attribute');
        Schema::dropIfExists('attribute_value');
        Schema::dropIfExists('category_attribute');
        Schema::dropIfExists('product_history');
        Schema::dropIfExists('favorite_product');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('transaction');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('notification');
        Schema::dropIfExists('slides');
        Schema::dropIfExists('users');
    }
}
