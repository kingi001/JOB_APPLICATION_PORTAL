<?php

namespace App\Livewire;
use App\Models\Vacancy;

use Livewire\Component;

class Screening extends Component

{
    public $reports = [
    [
        'key' => 'all_applicants',
        'title' => 'All Applicants Report',
        'records' => 248,
        'description' => 'Complete list of applicants who filled the application form',
        'updated' => 'Today',
    ],
    [
        'key' => 'incomplete',
        'title' => 'Incomplete Applications Report',
        'records' => 62,
        'description' => 'Applicants who filled the form but did not submit required documents',
        'updated' => 'Today',
    ],
    [
        'key' => 'complete',
        'title' => 'Complete Applications Report',
        'records' => 186,
        'description' => 'Applicants who filled the form and submitted all required documents',
        'updated' => 'Today',
    ],
    [
        'key' => 'gender',
        'title' => 'Gender Distribution Report',
        'records' => 186,
        'description' => 'Number of qualified applicants by gender',
        'updated' => 'Today',
    ],
    [
        'key' => 'county',
        'title' => 'County Distribution Report',
        'records' => 186,
        'description' => 'Number of qualified applicants by county',
        'updated' => 'Today',
    ],
    [
        'key' => 'pwd',
        'title' => 'PWD Applicants Report',
        'records' => 23,
        'description' => 'Persons with Disabilities who submitted complete applications',
        'updated' => 'Today',
    ],
];

public $activeVacancy = null;

public function toggleVacancy($id)
{
    $this->activeVacancy = $this->activeVacancy === $id ? null : $id;
}
public $selectedReports = [];
public $selectAll = false;

public function updatedSelectAll($value)
{
    $this->selectedReports = $value ? array_column($this->reports, 'key') : [];
}

public function generateSelectedReports()
{
    // Process selected reports and trigger export
}

public function download($reportKey)
{
    // Handle download for single report
}
public $availableDocuments = [
    'CV',
    'ID Copy',
    'Cover Letter',
    'Academic Certificates',
    'Professional Certificates',
    'Recommendation Letter',
];
     public $applications = [];
        public $education, $experience, $documents = [], $documentsInput;
    public $editing = false;
    public function saveRequirements()
    {
        $this->validate([
            'education' => 'required|string|min:3',
            'experience' => 'required|string|min:3',
            'documentsInput' => 'required|string',
        ]);

        $this->documents = array_map('trim', explode(',', $this->documentsInput));

        // Save to DB or emit event — example only
        // JobRequirement::update(...);

        $this->editing = false;

        session()->flash('message', 'Job requirements updated successfully!');
    }

    public function mount()
    {
          // Load existing job requirements (e.g. from DB or config)
        $this->education = 'Bachelor of Science in Computer Science';
        $this->experience = '2 years';
        $this->documents = ['CV', 'ID Copy', 'Academic Certificates'];
        $this->documentsInput = implode(', ', $this->documents);
        $this->applications = [
            [
                'name' => 'Jane Mwangi',
                'email' => 'jane@example.com',
                'county' => 'Nairobi',
                'gender' => 'Female',
                'pwd' => false,
                'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
                'education_level' => 'Degree',
                'meets_criteria' => true,
                'date_submitted' => '2025-07-05',
            ],
            [
                'name' => 'Ali Yusuf',
                'email' => 'ali@example.com',
                'county' => 'Mombasa',
                'gender' => 'Male',
                'pwd' => true,
                'documents' => ['cv.pdf', 'id.pdf'], // missing one
                'education_level' => 'Diploma',
                'meets_criteria' => false,
                'date_submitted' => '2025-07-03',
            ],
             [
                'name' => 'Jane Mwangi',
                'email' => 'jane@example.com',
                'county' => 'Nairobi',
                'gender' => 'Female',
                'pwd' => false,
                'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
                'education_level' => 'Degree',
                'meets_criteria' => true,
                'date_submitted' => '2025-07-05',
            ],
            [
                'name' => 'Ali Yusuf',
                'email' => 'ali@example.com',
                'county' => 'Mombasa',
                'gender' => 'Male',
                'pwd' => true,
                'documents' => ['cv.pdf', 'id.pdf'], // missing one
                'education_level' => 'Diploma',
                'meets_criteria' => false,
                'date_submitted' => '2025-07-03',
            ],
             [
                'name' => 'Ali Yusuf',
                'email' => 'ali@example.com',
                'county' => 'Mombasa',
                'gender' => 'Male',
                'pwd' => true,
                'documents' => ['cv.pdf', 'id.pdf'], // missing one
                'education_level' => 'Diploma',
                'meets_criteria' => false,
                'date_submitted' => '2025-07-03',
            ],
             [
                'name' => 'Ali Yusuf',
                'email' => 'ali@example.com',
                'county' => 'Mombasa',
                'gender' => 'Male',
                'pwd' => true,
                'documents' => ['cv.pdf', 'id.pdf'], // missing one
                'education_level' => 'Diploma',
                'meets_criteria' => false,
                'date_submitted' => '2025-07-03',
            ],
            [
                'name' => 'Jane Mwangi',
                'email' => 'jane@example.com',
                'county' => 'Nairobi',
                'gender' => 'Female',
                'pwd' => false,
                'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
                'education_level' => 'Degree',
                'meets_criteria' => true,
                'date_submitted' => '2025-07-05',
            ],
            [
                'name' => 'Jane Mwangi',
                'email' => 'jane@example.com',
                'county' => 'Nairobi',
                'gender' => 'Female',
                'pwd' => false,
                'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
                'education_level' => 'Degree',
                'meets_criteria' => true,
                'date_submitted' => '2025-07-05',
            ],
            [
                'name' => 'Jane Mwangi',
                'email' => 'jane@example.com',
                'county' => 'Nairobi',
                'gender' => 'Female',
                'pwd' => false,
                'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
                'education_level' => 'Degree',
                'meets_criteria' => true,
                'date_submitted' => '2025-07-05',
            ],
            [
                'name' => 'Jane Mwangi',
                'email' => 'jane@example.com',
                'county' => 'Nairobi',
                'gender' => 'Female',
                'pwd' => false,
                'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
                'education_level' => 'Degree',
                'meets_criteria' => true,
                'date_submitted' => '2025-07-05',
            ],
        ];


        // Apply screening logic
        foreach ($this->applications as &$app) {
            $requiredDocs = ['cv.pdf', 'id.pdf', 'certificate.pdf'];
            $hasAllDocs = count(array_intersect($requiredDocs, $app['documents'])) === count($requiredDocs);

            if (!$hasAllDocs) {
                $app['screening_status'] = 'Incomplete';
            } elseif ($app['meets_criteria']) {
                $app['screening_status'] = 'Qualified';
            } else {
                $app['screening_status'] = 'Disqualified';
            }

            $app['has_all_documents'] = $hasAllDocs;
        }
    }

    public $vacancies;
    public $editingVacancyId = null;
    public function render()
    {
        return view('livewire.screening');
    }
}
