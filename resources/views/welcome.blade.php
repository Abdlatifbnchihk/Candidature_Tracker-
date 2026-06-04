<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CandidatureTracker - Project Support</title>
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

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs px-5 py-2.5 rounded-xl border border-slate-700/50 transition">
                        Back to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-300 hover:text-white font-semibold text-xs transition">Sign in</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-500 via-indigo-600 to-teal-500 text-white font-bold text-xs px-5 py-2.5 rounded-xl shadow-[0_4px_20px_rgba(37,99,235,0.2)] transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main class="relative z-10 max-w-7xl mx-auto px-6 pt-20 pb-24 space-y-16">
        
        <div class="text-center space-y-6 max-w-3xl mx-auto">
            <div class="inline-flex items-center gap-2 bg-[#161D2E] border border-slate-800 px-3.5 py-1.5 rounded-full mb-4">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                <span class="text-[11px] font-bold tracking-wider text-blue-400 uppercase">Support Center</span>
            </div>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white leading-tight">
                How can we help with <br>
                <span class="bg-gradient-to-r from-blue-400 via-indigo-400 to-teal-400 bg-clip-text text-transparent">your career project?</span>
            </h1>
            <p class="text-slate-400 text-lg font-medium">
                Get technical assistance, report issues, or suggest new features for your tracking ecosystem.
            </p>
        </div>

        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Technical Support -->
            <div class="bg-[#111622] border border-slate-800/80 p-10 rounded-3xl shadow-2xl relative group hover:border-blue-500/50 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 mb-8">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Technical Help</h3>
                <p class="text-slate-400 leading-relaxed mb-8">Facing issues with your dashboard or recruitment pipelines? Our support team is ready to help you debug any system constraints.</p>
                <a href="mailto:support@candidaturetracker.com" class="inline-flex items-center gap-2 text-blue-400 font-bold hover:text-blue-300 transition group">
                    Contact Support 
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <!-- Documentation & FAQ -->
            <div class="bg-[#111622] border border-slate-800/80 p-10 rounded-3xl shadow-2xl relative group hover:border-emerald-500/50 transition-all duration-500">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 mb-8">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Protocol Guide</h3>
                <p class="text-slate-400 leading-relaxed mb-8">Learn how to maximize your interview preparation and manage your applications using our built-in organizational logic.</p>
                <a href="#" class="inline-flex items-center gap-2 text-emerald-400 font-bold hover:text-emerald-300 transition group">
                    View Documentation 
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </section>

        <div class="bg-gradient-to-b from-[#161D2E] to-[#111622] border border-slate-800 rounded-3xl p-12 text-center max-w-4xl mx-auto shadow-inner">
            <h4 class="text-xl font-bold text-white mb-4">Need urgent assistance?</h4>
            <p class="text-slate-400 text-sm mb-8">Our protocol response time is typically within 24 hours for all graduate support tickets.</p>
            <div class="flex flex-wrap justify-center gap-6 text-xs font-bold uppercase tracking-widest text-slate-500">
                <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span> Ticket System</span>
                <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Live Status</span>
                <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-teal-500 rounded-full"></span> Direct Chat</span>
            </div>
        </div>
    </main>

    <footer class="w-full border-t border-slate-800/50 bg-[#090D14] py-12 px-6 mt-12">
        <div class="max-w-7xl mx-auto flex flex-col items-center gap-6">
            <div class="flex items-center gap-8 text-sm font-medium text-slate-500">
                <a href="#" class="hover:text-white transition">Privacy Protocol</a>
                <a href="#" class="hover:text-white transition">Terms of Service</a>
                <a href="#" class="hover:text-white transition">Security Guidelines</a>
            </div>
            <p class="text-[11px] font-medium text-slate-600 text-center">
                &copy; {{ date('Y') }} CandidatureTracker. Optimized for the next generation of industry leaders.
            </p>
        </div>
    </footer>

</body>
</html>