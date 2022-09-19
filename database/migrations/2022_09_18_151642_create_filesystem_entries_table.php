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
        Schema::create('filesystem_entries', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignId('user_id')->constrained();
            $table->foreignUuid('parent')->nullable();
            $table->string('name')->nullable();
            $table->string('extension')->nullable();
            $table->enum('type', ['file','dir','ln']);
            $table->string('sha1')->nullable();
            $table->unsignedBigInteger('size')->nullable()->comment('Size in bytes');

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
        Schema::dropIfExists('filesystem_entries');
    }
};
