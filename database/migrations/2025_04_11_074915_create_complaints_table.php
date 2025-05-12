<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
           // معرف تلقائي
            $table->string('customer_name'); // اسم العميل
            $table->string('phone_email'); // الهاتف أو البريد الإلكتروني
            $table->text('content'); // محتوى الشكوى
            $table->string('type'); // نوع الشكوى
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // معرف المستخدم الذي أرسل الشكوى
            $table->foreignId('car_id')->constrained()->onDelete('cascade'); // معرف السيارة المرتبطة بالشكوى
            $table->boolean('approvd')->default(false); // حالة الموافقة
        $table->boolean('is_visible')->default(true);
            $table->timestamps(); // تواريخ الإنشاء والتحديث
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};
