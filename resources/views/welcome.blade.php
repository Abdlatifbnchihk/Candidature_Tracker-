<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CandidatureTracker - Elevate Your Career Launch</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0B0F17] text-slate-200 antialiased min-h-screen overflow-x-hidden">

    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[600px] pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[15%] w-[500px] h-[500px] bg-blue-500/10 rounded-full blur-[140px]"></div>
        <div class="absolute top-[5%] right-[10%] w-[600px] h-[600px] bg-emerald-500/10 rounded-full blur-[160px]"></div>
    </div>

    <header class="w-full border-b border-slate-800/40 bg-[#0B0F17]/70 backdrop-blur-xl sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 bg-gradient-to-tr from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-md shadow-blue-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">Candidature<span class="text-blue-500">Tracker</span></span>
            </div>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-400">
                <a href="#features" class="hover:text-white transition">Features</a>
                <a href="#metrics" class="hover:text-white transition">System Specs</a>
                <a href="#" class="hover:text-white transition">Premium Core</a>
            </nav>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs px-5 py-2.5 rounded-xl border border-slate-700/50 transition">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-300 hover:text-white font-semibold text-xs transition">
                            Sign in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-500 via-indigo-600 to-teal-500 hover:opacity-95 text-white font-bold text-xs px-5 py-2.5 rounded-xl shadow-[0_4px_20px_rgba(37,99,235,0.2)] transition">
                                Register Now
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <main class="relative z-10 max-w-7xl mx-auto px-6 pt-20 pb-24 text-center space-y-12">
        <div class="inline-flex items-center gap-2 bg-[#161D2E] border border-slate-800 px-3.5 py-1.5 rounded-full shadow-inner shadow-black/20">
            <span class="flex h-2 w-2 relative">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            <span class="text-[11px] font-bold tracking-wider text-slate-300 uppercase">Built Specifically for Recent Graduates</span>
        </div>

        <div class="max-w-3xl mx-auto space-y-6">
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-[1.1] text-white">
                Propel your <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-blue-400 via-emerald-400 to-teal-400 bg-clip-text text-transparent">career launch.</span>
            </h1>
            <p class="text-slate-400 text-base sm:text-lg max-w-xl mx-auto font-medium leading-relaxed">
                The premium tracking ecosystem engineered safely to manage your applications, interviews, and offers with zero mental clutter.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <a href="{{ route('register') }}" class="w-full sm:w-auto bg-gradient-to-r from-blue-500 via-indigo-600 to-teal-500 text-white font-bold text-sm px-8 py-3.5 rounded-xl shadow-[0_4px_25px_rgba(37,99,235,0.3)] transition flex items-center justify-center gap-2">
                <span>Start Free Account</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
            <a href="#features" class="w-full sm:w-auto bg-[#111622] border border-slate-800 hover:bg-[#161D2E] text-slate-300 font-semibold text-sm px-8 py-3.5 rounded-xl transition">
                Explore Features
            </a>
        </div>

        <section id="features" class="pt-24 grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            <div class="bg-[#111622] border border-slate-800/80 p-8 rounded-2xl shadow-2xl shadow-black/30 relative overflow-hidden group hover:border-slate-700 transition">
                <div class="w-12 h-12 rounded-xl bg-slate-800/50 border border-slate-700/40 flex items-center justify-center text-blue-400 mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-white tracking-wide">Smart Tracking</h3>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed">Visualize the state of each corporate pipeline status dynamically at a single glance without overhead spreadsheet management.</p>
            </div>

            <div class="bg-[#111622] border border-slate-800/80 p-8 rounded-2xl shadow-2xl shadow-black/30 relative overflow-hidden group hover:border-slate-700 transition">
                <div class="w-12 h-12 rounded-xl bg-slate-800/50 border border-slate-700/40 flex items-center justify-center text-emerald-400 mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-white tracking-wide">Real-time Sprints</h3>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed">Stay adaptive and monitor upcoming recruitment milestones, direct screenings, and coding interviews seamlessly.</p>
            </div>

            <div class="bg-[#111622] border border-slate-800/80 p-8 rounded-2xl shadow-2xl shadow-black/30 relative overflow-hidden group hover:border-slate-700 transition">
                <div class="w-12 h-12 rounded-xl bg-slate-800/50 border border-slate-700/40 flex items-center justify-center text-teal-400 mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-white tracking-wide">Premium Workspace</h3>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed">Enjoy an intuitive graduate dashboard workspace that safely manages update logging and scales off cognitive load.</p>
            </div>
        </section>
    </main>

    <footer class="w-full border-t border-slate-800/50 bg-[#090D14] py-8 px-6 mt-12">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between text-[11px] font-medium text-slate-500 gap-4">
            <span>&copy; {{ date('Y') }} CandidatureTracker. Designed with distinction for future leadership pipelines.</span>
            <div class="flex items-center gap-4 text-slate-400">
                <a href="#" class="hover:underline">Support System</a>
                <span>•</span>
                <a href="#" class="hover:underline">Privacy Guidelines</a>
                <span>•</span>
                <a href="#" class="hover:underline">Terms of Protocol</a>
            </div>
        </div>
    </footer>

</body>
</html>