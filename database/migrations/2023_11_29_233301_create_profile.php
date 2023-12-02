<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('number');
            $table->string('occupation')->nullable();
            $table->string('area');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            // $table->foreignId('user_id')->unique() ->constrained(
            //     table:'users', indexName:'profile_users_id'
            // )->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
