<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('people', 'links')->latest()->get();
        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);
        Project::create($validatedData);
        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    // UPDATED show() METHOD
    public function show(Project $project)
    {
        $project->load('people', 'links');
        // Get all people who are NOT already on this project
        $availablePeople = Person::whereDoesntHave('projects', function ($query) use ($project) {
            $query->where('project_id', $project->id);
        })->orderBy('name')->get();

        return view('projects.show', [
            'project' => $project,
            'availablePeople' => $availablePeople // Pass the new data to the view
        ]);
    }

    public function storeLink(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
        ]);
        $link = new Link($validatedData);
        $project->links()->save($link);
        return redirect()->route('projects.show', $project)->with('success', 'Link added successfully!');
    }

    // NEW assignPerson() METHOD
    public function assignPerson(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'person_id' => 'required|exists:people,id',
        ]);
        // The 'attach' method is for many-to-many relationships
        $project->people()->attach($validatedData['person_id']);
        return redirect()->route('projects.show', $project)->with('success', 'Person assigned to project!');
    }
}