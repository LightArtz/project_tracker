    @extends('layouts.app')

    @section('content')
        <h2 class="text-2xl font-semibold mb-6">Create a New Project</h2>

        <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf <!-- IMPORTANT: CSRF security token -->

                <div class="mb-4">
                    <label for="name" class="block text-slate-700 font-bold mb-2">Project Name</label>
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-slate-700 font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('projects.index') }}" class="text-slate-600 hover:text-slate-800 mr-4">Cancel</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                        Save Project
                    </button>
                </div>
            </form>
        </div>
    @endsection
    
