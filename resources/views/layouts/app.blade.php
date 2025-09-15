<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-slate-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="/" class="text-white font-bold text-xl">Project Tracker</a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Navigation Links -->
                                <a href="{{ route('projects.index') }}" class="text-slate-300 hover:bg-slate-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">All Projects</a>
                                <a href="{{ route('people.index') }}" class="text-slate-300 hover:bg-slate-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Manage People</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                    @yield('header', 'All Projects')
                </h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="px-4 py-6 sm:px-0">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>

