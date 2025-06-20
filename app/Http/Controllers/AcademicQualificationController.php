<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicQualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Auth::user()->educations()->orderBy('created_at', 'asc')->get();
        return view('applicant.academic.list.index', compact('educations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'level_of_study' => 'required|in:KCPE,KCSE,Vocational Training,Certificate,Diploma,Higher Diploma,Bachelor,Master,PhD',
            'field_of_study' => 'required|string|max:255',
            'award' => 'required|string|max:255',
            'academic_document' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        // Initialize document path
        $documentPath = null;
        // Check if a file was uploaded
        if ($request->hasFile('academic_document')) {
            // Store the file and get its path
            $documentPath = $request->file('academic_document')->store('academic_documents', 'public');
        }
        // Create a new education record
        Education::create([
            'user_id' => Auth::id(),
            'institution' => $request->institution,
            'level_of_study' => $request->level_of_study,
            'field_of_study' => $request->field_of_study,
            'award' => $request->award,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'academic_document' => $documentPath,
        ]);
        // Redirect back with a success message
        return redirect()->route('education.index')->with('success', 'Academic qualification added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $education = Education::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($education);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
