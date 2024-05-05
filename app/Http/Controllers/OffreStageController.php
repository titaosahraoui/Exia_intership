<?php

namespace App\Http\Controllers;

use App\Models\OffreStage;
use Illuminate\Http\Request;

class OffreStageController extends Controller
{
    /**
     * Display a listing of job offers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve a specific number of offres per page (e.g., 10)
        $offres = OffreStage::paginate(3);

        return view('offrestage.index', compact('offres'));
    }

    public function all()
    {
        $offres = OffreStage::all();
        return view('stage', compact('offres'));
    }


    /**
     * Show the form for creating a new job offer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offrestage.create');
    }

    /**
     * Store a newly created job offer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'competance' => 'required|string', // adjust based on actual requirements
            'description' => 'required|string|max:1000',
            'date_debut' => 'nullable|date',
            'duree' => 'nullable|string',
            'entreprise_id' => 'required|exists:entreprises,id',
        ]);

        try {
            $offre = new OffreStage($request->all());
            $offre->save();

            return redirect()->route('offrestage.index')->with('success', 'Job offer created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Error creating job offer.'])->withInput();
        }
    }


    /**
     * Display the specified job offer.
     *
     * @param  \App\Models\OffreStage  $offreStage
     * @return \Illuminate\Http\Response
     */
    public function show(OffreStage $offreStage)
    {
        return view('offrestage.show', compact('offreStage'));
    }

    /**
     * Show the form for editing the specified job offer.
     *
     * @param  \App\Models\OffreStage  $offreStage
     * @return \Illuminate\Http\Response
     */
    public function edit(OffreStage $offreStage)
    {
        // Pass only the ID of the OffreStage to the view
        $offreStageId = $offreStage->id;

        return view('offrestage.edit', compact('offreStageId'));
    }

    /**
     * Update the specified job offer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OffreStage  $offreStage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offreStage = OffreStage::findOrFail($id);

        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'competance' => 'required|string', // consider renaming to 'competence' if it's a typo
            'description' => 'required|string|max:1000',
            'date_debut' => 'nullable|date',
            'duree' => 'nullable|string',
            'entreprise_id' => 'required|exists:entreprises,id',
        ]);

        $offreStage->update($validatedData);

        return redirect()->route('offrestage.index')->with('success', 'Job offer updated successfully.');
    }



    /**
     * Remove the specified job offer from storage.
     *
     * @param  \App\Models\OffreStage  $offreStage
     * @return \Illuminate\Http\Response
     */
    public function destroy(OffreStage $offreStage)
    {
        $offreStage->delete();

        return redirect()->route('offrestage.index')->with('success', 'Job offer deleted successfully.');
    }
}
