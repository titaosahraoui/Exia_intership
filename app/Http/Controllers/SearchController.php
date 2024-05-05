<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entreprise;
use App\Models\OffreStage;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Search in the User model
        $userResults = User::where('name', 'LIKE', "%{$query}%")
            ->get();

        // Search in the Entreprise model
        $entrepriseResults = Entreprise::where('name', 'LIKE', "%{$query}%")
            ->get();

        $offres = OffreStage::where('titre', 'LIKE', "%{$query}%")
            ->get();


        return view('search.results', compact('userResults', 'entrepriseResults', 'offres'));
    }
}
