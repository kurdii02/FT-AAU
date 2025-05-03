<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section')->unique(); // "header", "features", "mission"
            $table->json('content'); // Store content as JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('homepage_contents');
    }
};
