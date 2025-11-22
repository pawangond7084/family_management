<?php

namespace App\Http\Controllers;
use App\Models\Child;
use App\Models\Family;
use Illuminate\Http\Request;


class ChildController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $family_id = $request->input('family_id');

        $query = Child::with('family');

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        if ($family_id) {
            $query->where('family_id', $family_id);
        }

        $children = $query->paginate(5);
        $families = Family::all();

        return view('children.index', compact('children', 'families', 'search', 'family_id'));
    }

    public function create()
    {
        $families = Family::all();
        return view('children.create', compact('families'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'family_id' => 'required',
            'name' => 'required',
            'age' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('children', 'public');
        }

        Child::create($data);
        return redirect()->route('children.index')->with('success', 'Child added successfully!');
    }

    public function edit(Child $child)
    {
        $families = Family::all();
        return view('children.edit', compact('child', 'families'));
    }

    public function update(Request $request, Child $child)
    {
        $data = $request->validate([
            'family_id' => 'required',
            'name' => 'required',
            'age' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('children', 'public');
        }

        $child->update($data);
        return redirect()->route('children.index')->with('success', 'Child updated!');
    }

    public function destroy(Child $child)
    {
        $child->delete();
        return back()->with('success', 'Child deleted!');
    }

    public function show(Child $child)
    {
        return view('children.show', compact('child'));
    }
}