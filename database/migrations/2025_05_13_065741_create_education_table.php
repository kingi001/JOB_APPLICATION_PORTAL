<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('institution');
            $table->enum('qualification', ['KCPE', 'KCSE', 'Vocational Training', 'Certificate', 'Diploma', 'Higher Diploma', 'Bachelor', 'Master', 'PhD']);
            $table->string('course');
            $table->enum('award',[ 'Pass', 'Credit', 'Distinction', 'Merit', 'Honors', 'First Class Honor', 'Second Class Upper', 'Second Class Lower', 'Third Class', 'Fail','A','A-','B','B-','C','C-','D','D-','E']);
            $table->string('academic_document')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
