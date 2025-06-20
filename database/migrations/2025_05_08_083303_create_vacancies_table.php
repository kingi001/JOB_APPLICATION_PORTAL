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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ref_no')->unique();
            $table->string('position');
            $table->enum('job_grade', [
                'BMA1',
                'BMA2',
                'BMA3',
                'BMA4',
                'BMA5',
                'BMA6',
                'BMA7',
                'BMA8',
                'BMA9',
                'BMA10',
                'BMA11',
                'BMA12'
            ]);
            $table->text('requirements');
            $table->text('duties');
            $table->date('application_deadline');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
