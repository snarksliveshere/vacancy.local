<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            // не стал делать уникальным или привязывать к юзеру, т.к. могут быть разные вариации
            $table->string('email');
            $table->string('title');
            $table->text('description');
            $table->boolean('publish')->default(0);
            // в принципе, можно и unsignedBigInteger, в зависимости от нагрузки
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('vacancies');
    }
}
