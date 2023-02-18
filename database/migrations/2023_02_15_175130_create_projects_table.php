<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();

            $table->string('name', 64)->unique();
            $table->text('description')->nullable();
            $table->string('main_image')->default('IMG-20201101-WA0000.jpg');
            $table->date('release_date');
            $table->string('repo_link')->unique();

            $table->timestamps();
        });
    }
};
