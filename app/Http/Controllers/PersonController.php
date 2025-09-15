<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of all people.
     */
    public function index()
    {
        $people = Person::orderBy('name')->get();
        return view('people.index', ['people' => $people]);
    }

    /**
     * Show the form for creating a new person.
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created person in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:people,email',
        ]);

        Person::create($validatedData);

        return redirect()->route('people.index')->with('success', 'Person added successfully!');
    }
}