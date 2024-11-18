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
            'capacity' => 'required|integer|min:1', 
        ], [
            'capacity.min' => 'Вместимость клетки должна быть не менее одного животного.',
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
            'capacity' => 'required|integer|min:' . max(1, $cage->animals->count()), 
        ], [
            'capacity.min' => 'Вместимость клетки не может быть меньше количества проживающих в ней животных и должна быть не менее одного.',
        ]);

        $cage->update($request->all());
        return redirect()->route('cages.index')->with('success', 'Параметры клетки успешно обновлены');
    }

    public function destroy(Cage $cage)
    {
        if ($cage->animals()->count() > 0) {
            return redirect()->route('cages.index')->with('error', 'Невозможно удалить клетку, в которой есть животные.');
        }

        $cage->delete();
        return redirect()->route('cages.index')->with('success', 'Клетка успешно удалена');
    }

    public function show(Cage $cage)
    {
        return view('cages.show', compact('cage'));
    }
}