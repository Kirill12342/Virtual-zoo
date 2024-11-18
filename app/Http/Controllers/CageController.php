<?php
namespace App\Http\Controllers;

use App\Models\Cage;
use App\Models\Animal;
use Illuminate\Http\Request;

class CageController extends Controller
{
    public function index()
    {
        $cages = Cage::with('animals')->get();
        $animalCount = Animal::count();
        return view('cages.index', compact('cages', 'animalCount'));
    }

    public function create()
    {
        return view('cages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);

        Cage::create($request->all());
        return redirect()->route('cages.index');
    }


    public function edit(Cage $cage)
    {
        return view('cages.edit', compact('cage'));
    }

    public function update(Request $request, Cage $cage)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer|min:' . $cage->animals->count(),
        ], [
            'capacity.min' => 'Вместимость клетки не может быть меньше количества проживающих в ней животных.',
        ]);

        $cage->update($request->all());
        return redirect()->route('cages.index')->with('success', 'Параметры клетки успешно обновлены');
    }

    public function destroy(Cage $cage)
    {
        $cage->delete();
        return redirect()->route('cages.index');
    }

    public function show(Cage $cage)
    {
        return view('cages.show', compact('cage'));
    }


    
}