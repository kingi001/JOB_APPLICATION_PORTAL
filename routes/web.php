<?php

use App\Http\Controllers\AcademicQualificationController;
use App\Http\Controllers\ApplicantDashboardController;
use App\Http\Controllers\DocumentUploadController;
use App\Http\Controllers\EmploymentHistoryController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PersonalDetailsController;
use App\Http\Controllers\ProfessionalQualificationController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\VacancyController;
use App\Livewire\Applicant\PersonalInformation;
use App\Livewire\Notes;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Vacancy\Vacancy;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [ApplicantDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    //notes routes
    Route::get('notes', Notes::class)->name('notes');
    Route::get('personal-info', PersonalInformation::class)->name('personal-information');

    Route::redirect('settings', 'settings/profile');
    Route::get('vacancies', Vacancy::class)->name('vacancies');

    Route::get('personal-information', [PersonalDetailsController::class, 'index'])->name('personal-details.show');
    Route::post('personal-information', [PersonalDetailsController::class, 'store'])->name('personal-info.store');
    //Resource Routes
    Route::resource('education', AcademicQualificationController::class);
    Route::resource('qualifications', ProfessionalQualificationController::class);
    Route::resource('memberships', MembershipController::class);
    Route::resource('employment', EmploymentHistoryController::class);
    Route::resource('referees', RefereeController::class);
    Route::resource('documents', DocumentUploadController::class);

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
