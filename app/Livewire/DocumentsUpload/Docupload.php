<?php

namespace App\Livewire\DocumentsUpload;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Docupload extends Component
{
    use WithFileUploads;

    // Form state
    public $application_letter;
    public $national_id;
    public $testimonials = []; // multiple testimonials
    public $existingDocuments;

    public function mount()
    {
        $this->existingDocuments = Document::where('user_id', Auth::id())->first();
    }

    public function save()
    {
        $this->validate([
            'application_letter' => $this->existingDocuments ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'national_id'        => $this->existingDocuments ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'testimonials.*'     => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $path = 'documents/' . Auth::id();

        // Upload single files
        $applicationLetterPath = $this->application_letter
            ? $this->application_letter->store($path, 'public')
            : ($this->existingDocuments->application_letter ?? null);

        $nationalIdPath = $this->national_id
            ? $this->national_id->store($path, 'public')
            : ($this->existingDocuments->national_id ?? null);

        // Handle multiple testimonials
        $testimonialsPaths = $this->existingDocuments && $this->existingDocuments->testimonials
            ? json_decode($this->existingDocuments->testimonials, true)
            : [];

        if ($this->testimonials) {
            foreach ($this->testimonials as $testimonial) {
                $testimonialsPaths[] = $testimonial->store($path, 'public');
            }
        }

        // Save or update record
        Document::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'application_letter' => $applicationLetterPath,
                'national_id'        => $nationalIdPath,
                'testimonials'       => json_encode($testimonialsPaths),
            ]
        );

        // Refresh
        $this->existingDocuments = Document::where('user_id', Auth::id())->first();
        $this->application_letter = null;
        $this->national_id = null;
        $this->testimonials = [];

        $this->dispatch('saved');
    }

    // Remove single files
    public function removeApplicationLetter()
    {
        if (!$this->existingDocuments) return;
        $this->existingDocuments->update(['application_letter' => null]);
        $this->existingDocuments = Document::where('user_id', Auth::id())->first();
        $this->application_letter = null;
    }

    public function removeNationalId()
    {
        if (!$this->existingDocuments) return;
        $this->existingDocuments->update(['national_id' => null]);
        $this->existingDocuments = Document::where('user_id', Auth::id())->first();
        $this->national_id = null;
    }

    // Remove specific testimonial by index
    public function removeTestimonial($index)
    {
        if (!$this->existingDocuments || !$this->existingDocuments->testimonials) return;

        $paths = json_decode($this->existingDocuments->testimonials, true);

        if (isset($paths[$index])) {
            // Delete from storage
            if (Storage::disk('public')->exists($paths[$index])) {
                Storage::disk('public')->delete($paths[$index]);
            }

            unset($paths[$index]);
            $this->existingDocuments->update(['testimonials' => json_encode(array_values($paths))]);
            $this->existingDocuments = Document::where('user_id', Auth::id())->first();
        }
    }

    public function render()
    {
        return view('livewire.documents-upload.docupload');
    }
}
