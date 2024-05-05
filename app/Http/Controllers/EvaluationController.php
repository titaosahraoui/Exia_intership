<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of evaluations.
     */
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new evaluation.
     */
    public function create()
    {
        return view('evaluations.create');
    }

    /**
     * Store a newly created evaluation in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'evaluator_id' => 'required|numeric',
            'evaluated_id' => 'required|numeric',
            'evaluator_type' => 'required|string',
            'evaluated_type' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Evaluation::create([
            'evaluator_id' => $request->evaluator_id,
            'evaluated_id' => $request->evaluated_id,
            'evaluator_type' => $request->evaluator_type,
            'evaluated_type' => $request->evaluated_type,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Evaluation submitted successfully.');
    }




    /**
     * Display the specified evaluation.
     */
    public function show(Evaluation $evaluation)
    {
        return view('evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified evaluation.
     */
    public function edit(Evaluation $evaluation)
    {
        return view('evaluations.edit', compact('evaluation'));
    }

    /**
     * Update the specified evaluation in the database.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'rating' => 'required|numeric',
            'comment' => 'nullable|string'
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation updated successfully.');
    }

    /**
     * Remove the specified evaluation from the database.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();

        return redirect()->route('evaluations.index')
            ->with('success', 'Evaluation deleted successfully.');
    }
}
