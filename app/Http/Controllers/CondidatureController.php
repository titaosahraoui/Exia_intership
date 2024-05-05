<?php

namespace App\Http\Controllers;

use App\Models\Condidature;
use App\Models\OffreStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CondidatureController extends Controller
{
    // Display a form for creating a new application
    public function create($offreStageId)
    {
        $offreStage = OffreStage::findOrFail($offreStageId); // Fetch the job offer using the ID
        return view('condidature.create', compact('offreStage')); // Pass the job offer to the view
    }

    // Store a new job application
    public function store(Request $request)
    {
        $request->validate([
            'offre_stage_id' => 'required|exists:offre_stages,id',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'lettre_de_motivation' => 'required|string',
            'date_de_soumission' => 'required|date',
        ]);

        $cvPath = $request->file('cv')->store('cvs', 'public');

        // Ensure that $cvPath is not null or false
        if (!$cvPath) {
            return back()->withErrors(['cv' => 'The CV could not be uploaded.']);
        }

        $condidature = new Condidature([
            'user_id' => Auth::id(), // Assuming the user is authenticated
            'offre_stage_id' => $request->offre_stage_id,
            'cv_path' => $cvPath,
            'lettre_de_motivation' => $request->lettre_de_motivation,
            'date_de_soumission' => $request->date_de_soumission,
            'etat' => 'pending',
            // Include other fields as needed
        ]);

        $condidature->save(); // Save the application

        return redirect()->route('condidature.index')->with('success', 'Application submitted successfully.');
    }


    // Display the user's job applications
    public function index()
    {
        $condidatures = Condidature::where('user_id', Auth::id())->get();
        // $condidatures = Condidature::all();
        return view('condidature.index', compact('condidatures'));
    }

    // Include other methods for showing, editing, updating, or deleting applications as needed
}
