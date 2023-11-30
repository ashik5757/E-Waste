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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('details');
            $table->string('category');
            $table->timestamps();

            // $table->unsignedBigInteger('user_id');

            

            $table->foreignId('user_id')->unique()->constrained(
                table:'users', indexName:'blog_users_id'
            )->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
