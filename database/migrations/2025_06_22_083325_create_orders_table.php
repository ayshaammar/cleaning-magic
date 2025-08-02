<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        // جدول الطلبات
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // العميل
            $table->string('order_number')->unique();
            $table->date('order_date');
            $table->date('execution_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('payment_method');
            $table->string('email');
            $table->string('phone');
            $table->string('customer_name');
            $table->string('national_id', 20);
            $table->date('date_of_birth');
            $table->string('address_country', 100);
            $table->string('address_province', 100);
            $table->string('address_city', 100);
            $table->string('address_near_landmark')->nullable();
            $table->string('mastercard_number', 20)->nullable();
            $table->timestamps();
        });

        // جدول ربط الطلبات بالمنتجات مع كمية وسعر المنتج في الطلب
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
}
