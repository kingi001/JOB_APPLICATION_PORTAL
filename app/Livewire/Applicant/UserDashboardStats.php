<?php

namespace App\Livewire\Applicant;

use App\Models\Vacancy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserDashboardStats extends Component
{
    use WithPagination;

    public $totalApplications;
    public $pendingApplications;
    public $shortlistedCount;
    public $rejectedCount;
    public $openVacanciesCount;
    public $applicationStatus;
    public $applications;

    public function mount()
    {
        $userId = Auth::id();

        $this->totalApplications = Vacancy::where('user_id', $userId)->count();
        $this->pendingApplications = Vacancy::where('user_id', $userId)->where('status', 'pending')->count();
        $this->shortlistedCount = Vacancy::where('user_id', $userId)->where('status', 'shortlisted')->count();
        $this->rejectedCount = Vacancy::where('user_id', $userId)->where('status', 'rejected')->count();

        $this->openVacanciesCount = Vacancy::where('user_id', $userId)
            ->where('application_deadline', '>', Carbon::now())
            ->count();

        $latestApplication = Vacancy::where('user_id', $userId)
            ->latest()
            ->with('vacancy')
            ->first();

        $this->applicationStatus = $latestApplication?->status ?? 'No Application Found';

        $this->applications = Vacancy::with('vacancy')
            ->where('user_id', $userId)
            ->latest()
            ->get();
    }

    public function render()
    {
          $vacancies = Vacancy::where('user_id', Auth::id())->latest()->paginate(10);

        return view('dashboard', [
            'vacancies' => $vacancies,
        ]);
    }
}
