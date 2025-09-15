@extends('layouts.app')

@section('header', 'Add a New Person')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto">
        <form action="{{ route('people.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-slate-700 font-bold mb-2">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-slate-700 @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block text-slate-700 font-bold mb-2">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-slate-700 @error('email') border-red-500 @enderror" required>
                 @error('email')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                    Save Person
                </button>
                <a href="{{ route('people.index') }}" class="text-slate-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
@endsection