<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantDashboardController extends Controller
{
     public function index()
    {
        $userId = Auth::id();

        $vacancies = Vacancy::where('user_id', $userId)->latest()->paginate(10);

        return view('dashboard', compact(
            'vacancies'
        ));
    }
}
