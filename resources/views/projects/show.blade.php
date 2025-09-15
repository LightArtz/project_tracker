@extends('layouts.app')

@section('header')
    {{ $project->name }}
@endsection

@section('content')
    <div class="mb-6">
        <a href="{{ route('projects.index') }}" class="text-blue-600 hover:underline">&larr; Back to all projects</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-md mb-8">
        <p class="text-slate-600">{{ $project->description }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- People Section -->
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold mb-4">Team Members</h3>
            <ul class="list-disc list-inside text-slate-700 mb-6">
                @forelse($project->people as $person)
                    <li>{{ $person->name }} ({{ $person->email }})</li>
                @empty
                    <li>No one has been assigned to this project yet.</li>
                @endforelse
            </ul>

            <!-- Form to assign an existing person -->
            <div class="border-t pt-6">
                <h4 class="font-bold mb-4">Assign a Person</h4>
                 <form action="{{ route('projects.people.assign', $project) }}" method="POST">
                    @csrf
                    <div class="flex items-center">
                        <select name="person_id" class="flex-grow shadow border rounded py-2 px-3 text-slate-700 mr-4">
                            <option value="">Select a person...</option>
                            @foreach($availablePeople as $person)
                                <option value="{{ $person->id }}">{{ $person->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                            Assign
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Links Section -->
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold mb-4">Project Links</h3>
            <ul class="list-disc list-inside text-slate-700 mb-6">
                 @forelse($project->links as $link)
                    <li><a href="{{ $link->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $link->title }}</a></li>
                @empty
                    <li>No links have been added yet.</li>
                @endforelse
            </ul>

            <div class="border-t pt-6">
                <h4 class="font-bold mb-4">Add a New Link</h4>
                <form action="{{ route('projects.links.store', $project) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-slate-700 font-bold mb-2">Link Title</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-slate-700" required>
                    </div>
                    <div class="mb-4">
                        <label for="url" class="block text-slate-700 font-bold mb-2">URL</label>
                        <input type="url" name="url" id="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-slate-700" required>
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                        Add Link
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection