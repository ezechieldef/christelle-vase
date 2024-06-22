<?php

namespace App\Http\Controllers;

use App\Models\TypePopulation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TypePopulationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TypePopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $typePopulations = TypePopulation::paginate();

        return view('type-population.index', compact('typePopulations'))
            ->with('i', ($request->input('page', 1) - 1) * $typePopulations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $typePopulation = new TypePopulation();

        return view('type-population.create', compact('typePopulation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypePopulationRequest $request): RedirectResponse
    {
        $all = $request->validated();
        TypePopulation::create($all);

        return Redirect::route('type-populations.index')
            ->with('success', 'TypePopulation a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $typePopulation = TypePopulation::findOrFail($id);

        return view('type-population.show', compact('typePopulation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $typePopulation = TypePopulation::findOrFail($id);

        return view('type-population.edit', compact('typePopulation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypePopulationRequest $request, TypePopulation $typePopulation): RedirectResponse
    {
        $all=$request->validated();
        $typePopulation->update($all);

        return Redirect::route('type-populations.index')
            ->with('success', 'TypePopulation a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = TypePopulation::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du TypePopulation !" . $th->getMessage()]);
        }


        return Redirect::route('type-populations.index')
            ->with('success', 'TypePopulation a été supprimé(e) avec succes !');
    }
}
