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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->enum('salutation', ['Mr.', 'Mrs.', 'Ms.', 'Dr.', 'Prof.', 'Eng.'])->nullable();
            $table->string('surname');
            $table->string('other_names');
            $table->string('national_id')->unique();
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->foreignId('county_id')->nullable()->constrained('counties')->nullOnDelete();
            $table->foreignId('ethnicity_id')->nullable()->constrained('ethnicities')->nullOnDelete();
            $table->string('phone_number')->unique();
            $table->string('postal_code')->nullable();
            $table->string('alternative_email')->unique()->nullable();
            $table->foreignId('religion_id')->nullable()->constrained('religions')->nullOnDelete();
            $table->enum('disability_status', ['Yes', 'No'])->default('No');
            $table->string('disability_description')->nullable();
            $table->string('ncpwd_number')->unique()->nullable();
            $table->enum('internal_applicant', ['Yes', 'No'])->default('No');
            $table->enum('department', ['Corporate Services', 'MTOT', 'Academic Affairs', 'Legal', 'Internal Audit', 'Supply Chain'])->nullable();
            $table->string('designation')->nullable();
            $table->enum('employment_terms', ['Permanent', 'Contract','Casual','Internship'])->nullable();
            $table->enum('job_grade',['BMA1','BMA2','BMA3','BMA4','BMA5','BMA6','BMA7','BMA8','BMA9','BMA10','BMA11','BMA12','BMA13'])->nullable();
            $table->date('date_of_appointment')->nullable();
            $table->enum('conviction_status', ['Yes', 'No'])->default('No');
            $table->text('conviction_details')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
