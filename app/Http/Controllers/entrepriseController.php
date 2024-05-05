<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::withAvg('receivedEvaluations', 'rating')->paginate(2);
        return view('entreprises.index', compact('entreprises'));
    }

    public function create()
    {
        return view('entreprises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'secteur' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        Entreprise::create($request->all());

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise created successfully.');
    }

    public function edit($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        return view('entreprises.edit', compact('entreprise'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'secteur' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        $entreprise = Entreprise::find($id);
        $entreprise->update($request->all());

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise updated successfully.');
    }

    public function destroy($id)
    {
        $entreprise = Entreprise::find($id);
        $entreprise->delete();

        return redirect()->route('entreprises.index')
            ->with('success', 'Entreprise deleted successfully.');
    }
    public function delete($id)
    {
        $ent = Entreprise::find($id);
        return view('entreprises.delete', ['ent' => $ent]);
    }
    public function show($id)
    {
        $enterprise = Entreprise::findOrFail($id);
        // Pass any additional data necessary for showing the enterprise details
        return view('entreprises.show', compact('enterprise'));
    }
}
