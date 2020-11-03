<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->default('user.png');
            $table->text('about_ar')->default('تحدث عن محتوى تطبيقنا');
            $table->text('about_en')->default('Talk about application us ');
            $table->string('snap')->nullable();
            $table->string('emailapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('twitter')->nullable();
            $table->string('watsapp')->nullable();
            $table->string('phone_no')->nullable();
            $table->text('services_ar')->default('الخدمات التى نقدمها :');
            $table->text('services_en')->default('services us that provid it :');
            $table->text('Mechanism_en')->default('الية العمل الخاص بنا   :');
            $table->text('Mechanism_ar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        App\Models\Admin::create([
            'name' => 'SmartBus',
            'email' => 'SmartBus@i.com',
            'password' => Hash::make('123456'),
            'image' => 'user.png',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
