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
        Schema::create('professional_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('qualification_name');
            $table->string('certifying_body');
            $table->string('certificate_number')->nullable();
            $table->enum('award',['certified','pass','distinction','credit'])->nullable();
            $table->date('date_awarded')->nullable();
            $table->date('valid_until')->nullable();
            $table->string('qualification_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_qualifications');
    }
};
