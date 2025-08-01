<?php
use App\Http\Controllers\ApplicantDashboardController;
use App\Http\Controllers\DocumentUploadController;
use App\Http\Controllers\EmploymentHistoryController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\RefereeController;
use App\Livewire\AcademicQualification\Academic;
use App\Livewire\Applicant\PersonalInformation;
use App\Livewire\Applications;
use App\Livewire\ProfessionanlQualification\Professional;
use App\Livewire\Screening;
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
    Route::get('PersonalInformation', PersonalInformation::class)->name('personal-information');
    Route::get('Vacancies', Vacancy::class)->name('vacancies');
    Route::get('AcademicQualification', Academic::class)->name('education');
    Route::get('ProfessionalQualification', Professional::class)->name('professional-qualification');
    Route::get('Applications', Applications::class)->name('applications');
    Route::get('Screening', Screening::class)->name('screening');

    Route::redirect('settings', 'settings/profile');

    Route::resource('memberships', MembershipController::class);
    Route::resource('employment', EmploymentHistoryController::class);
    Route::resource('referees', RefereeController::class);
    Route::resource('documents', DocumentUploadController::class);

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
