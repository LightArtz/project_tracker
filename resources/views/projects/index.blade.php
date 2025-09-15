@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">All Projects</h2>
        <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
            + Add New Project
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($projects as $project)
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow flex flex-col">
                <div class="flex-grow">
                    {{-- THIS IS THE FIX: The project name is now a link --}}
                    <a href="{{ route('projects.show', $project) }}" class="block">
                        <h3 class="font-bold text-xl mb-2 text-blue-700 hover:underline">{{ $project->name }}</h3>
                    </a>
                    <p class="text-slate-600 mb-4">{{ $project->description }}</p>
                </div>

                <div class="border-t pt-4">
                    <h4 class="font-semibold mb-2">People:</h4>
                    <ul class="list-disc list-inside text-slate-500 text-sm">
                        @forelse ($project->people as $person)
                            <li>{{ $person->name }}</li>
                        @empty
                            <li>No people assigned yet.</li>
                        @endforelse
                    </ul>

                    <h4 class="font-semibold mt-4 mb-2">Links:</h4>
                    <ul class="list-disc list-inside text-sm">
                         @forelse ($project->links as $link)
                            <li><a href="{{ $link->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $link->title }}</a></li>
                        @empty
                            <li>No links added yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white p-6 rounded-lg shadow-md text-center">
                <p>No projects found. Create one to get started!</p>
            </div>
        @endforelse
    </div>
@endsection