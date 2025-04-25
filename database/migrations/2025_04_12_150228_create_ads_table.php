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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('image')->nullable(); // رابط أو اسم ملف الصورة
            $table->string('ad_url')->nullable(); // رابط الإعلان
            $table->unsignedInteger('hit')->default(0); // عدد المشاهدات
            $table->date('start_date')->nullable(); // تاريخ بداية الإعلان
            $table->date('end_date')->nullable(); // تاريخ نهاية الإعلان
            $table->string('location')->nullable(); // الموقع الجغرافي
            $table->boolean('approved')->default(false); // إضافة العمود approved
            $table->string('phone_number')->nullable(); // رقم الهاتف


            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
