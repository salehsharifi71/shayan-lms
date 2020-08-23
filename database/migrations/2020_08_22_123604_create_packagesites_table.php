<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packagesites', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('wage')->default(6);
            $table->string('support')->nullable();
            $table->string('telsupport')->nullable();
            $table->string('domain')->nullable();
            $table->string('logo')->nullable();
            $table->integer('price')->default(0);
            $table->integer('userLimit')->default(0);
            $table->boolean('isActive')->default(0);
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packagesites');
    }
}
