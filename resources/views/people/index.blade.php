@extends('layouts.app')

@section('header', 'Manage People')

@section('content')
    <div class="flex justify-end items-center mb-6">
        <a href="{{ route('people.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
            + Add New Person
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <ul class="divide-y divide-slate-200">
                @forelse($people as $person)
                    <li class="py-4 flex">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-slate-900">{{ $person->name }}</p>
                            <p class="text-sm text-slate-500">{{ $person->email }}</p>
                        </div>
                    </li>
                @empty
                    <li class="py-4 text-center text-slate-500">
                        No people have been added yet.
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection