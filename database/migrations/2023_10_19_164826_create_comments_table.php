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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text',5000);
            $table->integer('minutesUsed');
            $table->unsignedBigInteger('issue_id');
            $table->timestamps();
            
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
            
        });
        
    }
    
    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};