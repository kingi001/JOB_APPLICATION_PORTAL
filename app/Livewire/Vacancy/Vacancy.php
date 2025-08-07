<?php

namespace App\Livewire\Vacancy;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vacancy as VacancyModel; // Alias to avoid conflict
use Flux\Flux;

class Vacancy extends Component
{
    public $vacancyId;
    public $selectedRefNo;
    //an array to hold selected vacancies for bulk delete
    public $selected = [];

    public array $selectedIds = [];

    use WithPagination;
    public $search = '';
    public $status = '';  // <-- Add this line
    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
    }
    public function render()
    {
        $vacancy = VacancyModel::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('ref_no', 'like', '%' . $this->search . '%')
                        ->orWhere('position', 'like', '%' . $this->search . '%')
                        ->orWhere('job_grade', 'like', '%' . $this->search . '%')
                        ->orWhere('requirements', 'like', '%' . $this->search . '%')
                        ->orWhere('duties', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status === 'deleted', fn($q) => $q->onlyTrashed())
            ->when($this->status === 'open', fn($q) => $q->where('status', 'open'))
            ->when($this->status === 'closed', fn($q) => $q->where('status', 'closed'))
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('livewire.vacancy.vacancy', [
            'vacancies' => $vacancy
        ]);
    }
    public function edit($id)
    {
        $this->dispatch('edit-vacancy', $id);
    }
    public function delete($id)
    {
        $vacancy = Vacancymodel::findOrFail($id);
        $this->vacancyId = $vacancy->id;
        //display the modal with the vacancy details
        $this->selectedRefNo = $vacancy->ref_no;
        Flux::modal('delete-vacancy')->show();
    }
    public function confirmDelete()
    {
        $vacancy = VacancyModel::findOrFail($this->vacancyId);
        $vacancy->delete();
        session()->flash('success', 'Vacancy deleted successfully.');
        Flux::modal('delete-vacancy')->close();
        // Redirect to the vacancies page
        return redirect()->route('vacancies');
    }
    public function cancelDelete()
    {
        $this->reset(['vacancyId', 'selectedRefNo']);
        Flux::modal('delete-vacancy')->close();
    }
    // Method to show the bulk delete modal confirmation before deletion
    public function getSelectedIds()
    {
        return $this->selected ?? [];
    }
    public function confirmBulkDeleteModal()
    {
        Flux::modal('confirm-bulk-delete')->show();
    }
    public function cancelBulkDelete()
    {
        $this->reset(['selected']);
        // Close the modal
        Flux::modal('confirm-bulk-delete')->close();
        return redirect()->route('vacancies');
    }
    public function bulkDelete()
    {
        if (empty($this->selectedIds)) {
            session()->flash('error', 'Please select at least one vacancy to delete.');
            return;
        }
        VacancyModel::whereIn('id', $this->selectedIds)->delete();
        session()->flash('success', 'Selected vacancies deleted successfully.');
        // Optionally reset selectedIds
        $this->selectedIds = [];
        // Close the modal
        Flux::modal('confirm-bulk-delete')->close();
        // Optional redirect (usually not needed in Livewire unless you're navigating away)
        return redirect()->route('vacancies');
    }
    public function restore($ids)
    {
        // Restore multiple vacancies
        VacancyModel::onlyTrashed()
            ->whereIn('id', $ids)
            ->restore();
        session()->flash('success', 'Selected vacancies restored successfully.');
        // Redirect to the vacancies page
        return redirect()->route('vacancies');
    }
    public function forceDelete($ids)
    {
        $ids = (array) $ids;
        VacancyModel::onlyTrashed()
            ->whereIn('id', $ids)
            ->forceDelete();
        session()->flash('success', 'Selected vacancies permanently deleted.');
        // Redirect to the vacancies page
        return redirect()->route('vacancies');
    }
}
