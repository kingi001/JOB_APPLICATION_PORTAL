<?php

namespace App\Livewire;
use App\Models\Application;


use Livewire\Component;

class Applications extends Component
{
    public $applications;
    public function mount()
    {
        // Mock data (no backend or DB yet)
        // $this->applications = [
        //     [
        //         'name' => 'Jane Mwangi',
        //         'email' => 'jane@example.com',
        //         'nationalid' => '12345678',
        //         'county' => 'Nairobi',
        //         'gender' => 'Female',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-05',
        //         'status' => 'Complete',
        //     ],
        //     [
        //         'name' => 'Ali Yusuf',
        //         'email' => 'ali@example.com',
        //         'nationalid' => '87654321',
        //         'county' => 'Mombasa',
        //         'gender' => 'Male',
        //         'pwd' => true,
        //         'documents' => ['cv.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-04',
        //         'status' => 'Incomplete',
        //     ],
        //     [
        //         'name' => 'Faith Njoki',
        //         'email' => 'faith@example.com',
        //         'nationalid' => '23456789',
        //         'county' => 'Kiambu',
        //         'gender' => 'Female',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-03',
        //         'status' => 'Complete',
        //     ],
        //     [
        //         'name' => 'Brian Otieno',
        //         'email' => 'brian@example.com',
        //         'nationalid' => '34567890',
        //         'county' => 'Kisumu',
        //         'gender' => 'Male',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf'],
        //         'date_submitted' => '2025-07-02',
        //         'status' => 'Incomplete',
        //     ],
        //     [
        //         'name' => 'Amina Noor',
        //         'email' => 'amina@example.com',
        //         'nationalid' => '45678901',
        //         'county' => 'Garissa',
        //         'gender' => 'Female',
        //         'pwd' => true,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-01',
        //         'status' => 'Complete',
        //     ],
        //      [
        //         'name' => 'Brian Otieno',
        //         'email' => 'brian@example.com',
        //         'nationalid' => '34567890',
        //         'county' => 'Kisumu',
        //         'gender' => 'Male',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf'],
        //         'date_submitted' => '2025-07-02',
        //         'status' => 'Incomplete',
        //     ],
        //     [
        //         'name' => 'Amina Noor',
        //         'email' => 'amina@example.com',
        //         'nationalid' => '45678901',
        //         'county' => 'Garissa',
        //         'gender' => 'Female',
        //         'pwd' => true,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-01',
        //         'status' => 'Complete',
        //     ],
        //      [
        //         'name' => 'Brian Otieno',
        //         'email' => 'brian@example.com',
        //         'nationalid' => '34567890',
        //         'county' => 'Kisumu',
        //         'gender' => 'Male',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf'],
        //         'date_submitted' => '2025-07-02',
        //         'status' => 'Incomplete',
        //     ],
        //     [
        //         'name' => 'Amina Noor',
        //         'email' => 'amina@example.com',
        //         'nationalid' => '45678901',
        //         'county' => 'Garissa',
        //         'gender' => 'Female',
        //         'pwd' => true,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-01',
        //         'status' => 'Complete',
        //     ],
        //      [
        //         'name' => 'Amina Noor',
        //         'email' => 'amina@example.com',
        //         'nationalid' => '45678901',
        //         'county' => 'Garissa',
        //         'gender' => 'Female',
        //         'pwd' => true,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-01',
        //         'status' => 'Complete',
        //     ],
        //      [
        //         'name' => 'Jane Mwangi',
        //         'email' => 'jane@example.com',
        //         'nationalid' => '12345678',
        //         'county' => 'Nairobi',
        //         'gender' => 'Female',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-05',
        //         'status' => 'Complete',
        //     ],
        //     [
        //         'name' => 'Ali Yusuf',
        //         'email' => 'ali@example.com',
        //         'nationalid' => '87654321',
        //         'county' => 'Mombasa',
        //         'gender' => 'Male',
        //         'pwd' => true,
        //         'documents' => ['cv.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-04',
        //         'status' => 'Incomplete',
        //     ],
        //     [
        //         'name' => 'Faith Njoki',
        //         'email' => 'faith@example.com',
        //         'nationalid' => '23456789',
        //         'county' => 'Kiambu',
        //         'gender' => 'Female',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-03',
        //         'status' => 'Complete',
        //     ],
        //       [
        //         'name' => 'Ali Yusuf',
        //         'email' => 'ali@example.com',
        //         'nationalid' => '87654321',
        //         'county' => 'Mombasa',
        //         'gender' => 'Male',
        //         'pwd' => true,
        //         'documents' => ['cv.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-04',
        //         'status' => 'Incomplete',
        //     ],
        //     [
        //         'name' => 'Faith Njoki',
        //         'email' => 'faith@example.com',
        //         'nationalid' => '23456789',
        //         'county' => 'Kiambu',
        //         'gender' => 'Female',
        //         'pwd' => false,
        //         'documents' => ['cv.pdf', 'id.pdf', 'certificate.pdf'],
        //         'date_submitted' => '2025-07-03',
        //         'status' => 'Complete',
        //     ],
        // ];
         $this->applications = Application::with('user','vacancy')->get();
    }

    public function render()
    {
        return view('livewire.applications');
    }
}
