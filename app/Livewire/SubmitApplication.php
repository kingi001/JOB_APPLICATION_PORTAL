<?php

namespace App\Livewire;

use \PDF;
use App\Models\Application;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Membership;
use App\Models\ProfessionalQualification;
use App\Models\Referee;
use App\Models\User;
use App\Models\Vacancy;
use Barryvdh\DomPDF\Facade\Pdf as PDFMAIN;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitApplication extends Component
{
    public $vacancy_id;
    public $declaration = false; // <-- bind the checkbox
    public $latestApplication = null; // <-- store latest application

    // <-- for CV preview and upload
    use WithFileUploads;
    public $previewUrl;
    public $vacancies = [];
    public function mount()
    {
        $this->vacancies = Vacancy::where('status', 'open')
            ->orderBy('position')
            ->get();
        $this->latestApplication = Application::where('user_id', Auth::id())
            ->latest()
            ->first();
        $this->generatePreview();
    }
    public function generatePreview()
    {
        $dir = storage_path('app/public/temp');

        // Create directory if it doesn't exist
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true); // recursive = true
        }
        // ✅ Get currently logged-in user ID
        $userId = Auth::id();
        // ✅ Get user's education, qualifications, memberships, employments, and referees
        $education = Education::where('user_id', $userId)->get();
        $qualifications = ProfessionalQualification::where('user_id', $userId)->get();
        $memberships = Membership::where('user_id', $userId)->get();
        $employments = Employment::where('user_id', $userId)->get();
        $referees = Referee::where('user_id', $userId)->get();
        // ✅ Prepare data for PDF
        $data = [
            'user' => $userId,
            'education' => $education,
            'qualifications' => $qualifications,
            'memberships' => $memberships,
            'employments' => $employments,
            'referees' => $referees,
        ];
        // ✅ Generate PDF using a Blade view
        $pdf = PDFMAIN::loadView('pdfs.cv_template', $data);
        // ✅ Store PDF temporarily and get its URL for preview
        $tempPath = 'temp/cv_preview_' . $userId . '.pdf';
        $pdf->save(storage_path('app/public/' . $tempPath));
        // ✅ Set preview URL
        $this->previewUrl = asset('storage/' . $tempPath);
    }
    public function submit()
    {
        $this->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
            'declaration'     => 'accepted', // ✅ checkbox must be checked
        ]);
        // Prevent multiple applications for same job
        if (Application::where('user_id', Auth::id())->where('vacancy_id', $this->vacancy_id)->exists()) {
            session()->flash('error', 'You have already applied for this job.');
            return;
        }

        Application::create([
            'user_id' => Auth::id(),
            'vacancy_id' => $this->vacancy_id,
            'status' => 'pending',
        ]);
        session()->flash('success', 'Application submitted successfully!');
        $this->reset(['vacancy_id', 'declaration']); // reset select
    }
    public function render()
    {
        return view('livewire.submit-application');
    }
}
