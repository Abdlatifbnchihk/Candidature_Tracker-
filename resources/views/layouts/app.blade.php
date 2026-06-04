<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>InterviewPrep - Recruitment Workspace</title>

    <!-- Professional Typography (Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />

    <!-- Style Assets (React/Tailwind Integration) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#F8FAFC] text-slate-900">

    <div class="min-h-screen flex flex-col">
        <!-- 
            CONSOLIDATED GLOBAL HEADER 
            This is the only header that will show for your internal app pages.
        -->
        <header class="bg-white border-b border-slate-100 px-8 py-4 sticky top-0 z-50 shadow-sm/50">
            <div class="max-w-7xl mx-auto flex items-center justify-between">

                <!-- Brand & Navigation -->
                <div class="flex items-center gap-10">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 group">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#7C3AED] to-indigo-600 flex items-center justify-center shadow-lg shadow-purple-500/20 text-white transition-transform group-hover:scale-105">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span class="font-black text-slate-800 tracking-tighter text-base lawercase">Candidature<span
                                class="text-[#7C3AED]">Tracker</span></span>
                    </a>

                    <nav class="hidden md:flex items-center gap-2">
                        <a href="{{ route('dashboard') }}"
                            class="px-4 py-2 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('dashboard') ? 'bg-purple-50 text-[#7C3AED]' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('applications.index') }}"
                            class="px-4 py-2 rounded-xl text-sm font-bold transition-all {{ (Request::routeIs('applications.*') && !Request::routeIs('applications.archive')) ? 'bg-purple-50 text-[#7C3AED]' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                            Applications
                        </a>

                        <a href="{{ route('applications.archive') }}"
                            class="px-4 py-2 rounded-xl text-sm font-bold transition-all {{ Request::routeIs('applications.archive') ? 'bg-purple-50 text-[#7C3AED]' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }}">
                            Archive
                        </a>
                    </nav>
                </div>

                <!-- User Profile & System Actions -->
                <div class="flex items-center gap-4">
                    <!-- Notifications -->
                    <button
                        class="w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-slate-50 transition-colors relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span
                            class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 border-2 border-white rounded-full"></span>
                    </button>

                    <div class="h-6 w-px bg-slate-200 mx-2"></div>

                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition-all shadow-md shadow-slate-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- 
            MAIN CONTENT AREA
            This is where individual blade files (dashboard, applications, etc.) 
            will inject their content.
        -->
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>

</body>

</html>