<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $cages = Cage::all();
        return view('animals.create', compact('cages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'species' => 'required',
            'name' => 'required',
            'age' => 'required|integer',
            'description' => 'required',
            'cage_id' => 'required|exists:cages,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Animal::create($data);

        return redirect()->route('animals.index')->with('success', 'Животное успешно добавлено');
    }

    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $cages = Cage::all();
        return view('animals.edit', compact('animal', 'cages'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'species' => 'required',
            'name' => 'required',
            'age' => 'required|integer',
            'description' => 'required',
            'cage_id' => 'required|exists:cages,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($animal->image) {
                Storage::disk('public')->delete($animal->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $animal->update($data);

        return redirect()->route('animals.index')->with('success', 'Информация о животном успешно обновлена');
    }

    public function destroy(Animal $animal)
    {
        if ($animal->image) {
            Storage::disk('public')->delete($animal->image);
        }
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Животное успешно удалено');
    }
}