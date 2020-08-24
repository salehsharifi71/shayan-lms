<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('maxUser')->default(8);
            $table->decimal('price');
            $table->decimal('userPrice')->default(0);
            $table->boolean('isActiveMic')->default(0);
            $table->boolean('isActiveWebcam')->default(0);
            $table->boolean('isActiveHalfPrice')->default(0);
            $table->boolean('isActiveRecording')->default(0);
            $table->integer('status')->default(0);
            $table->integer('bbbmeet_id')->nullable();
            $table->integer('clength')->default(30);
            $table->integer('signUpKind')->default(0);
            $table->string('logo')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('hash')->nullable();
            $table->string('openTime')->nullable();
            $table->string('closeTime')->nullable();
            $table->date('start_at')->nullable();
            $table->date('expired_at')->nullable();
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
        Schema::dropIfExists('meets');
    }
}
