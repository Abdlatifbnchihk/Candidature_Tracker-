<x-guest-layout>
    <div class="fixed inset-0 min-h-screen w-screen flex bg-[#0B0F17] text-white font-sans overflow-x-hidden">
        
        <div class="hidden lg:flex lg:w-1/2 relative flex-col justify-between p-16 bg-gradient-to-br from-[#121A2E] via-[#0D2423] to-[#0B1516] border-r border-slate-800/40">
            <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-emerald-500/10 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/10 rounded-full blur-[130px] pointer-events-none"></div>

            <div class="flex items-center gap-2.5 relative z-10">
                <div class="w-9 h-9 bg-gradient-to-tr from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-md shadow-blue-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">Candidature<span class="text-blue-500">Tracker</span></span>
            </div>

            <div class="my-auto max-w-lg space-y-8 relative z-10">
                <h1 class="text-[44px] font-extrabold tracking-tight leading-[1.1] text-white">
                    Propel your <br>
                    <span class="bg-gradient-to-r from-blue-400 via-emerald-400 to-teal-400 bg-clip-text text-transparent">career launch.</span>
                </h1>
                
                <p class="text-slate-400 text-base leading-relaxed font-medium">
                    The premium platform designed exclusively for recent graduates who leave absolutely nothing to chance.
                </p>

                <div class="space-y-6 pt-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-800/50 border border-slate-700/40 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-200 text-sm tracking-wide">Smart Tracking</h4>
                            <p class="text-xs text-slate-400 mt-0.5 leading-normal">Visualize the state of each application at a single glance with our dynamic metrics pipeline.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-800/50 border border-slate-700/40 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-200 text-sm tracking-wide">Real-time Sprints</h4>
                            <p class="text-xs text-slate-400 mt-0.5 leading-normal">Stay adaptive and manage upcoming corporate interviews with total strategic efficiency.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-slate-800/50 border border-slate-700/40 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-200 text-sm tracking-wide">Premium Workspace</h4>
                            <p class="text-xs text-slate-400 mt-0.5 leading-normal">Enjoy a tailored interface that safely updates status logs and removes mental load.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-[10px] text-slate-500 font-mono tracking-wider relative z-10 uppercase">
                • CandidatureTracker v1.0.4 Premium
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-between p-8 sm:p-16 relative items-center justify-center">
            
            <div class="w-full max-w-md bg-[#111622] border border-slate-800/80 rounded-2xl p-8 sm:p-10 shadow-2xl shadow-black/40 my-auto">
                
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-white tracking-tight">Glad to see you again</h2>
                    <p class="text-slate-400 text-xs font-medium mt-2">Enter your access credentials to manage opportunities.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div class="space-y-1.5">
                        <label for="email" class="text-xs font-semibold text-slate-300 tracking-wide">Email address</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="name@example.com" 
                                class="w-full pl-11 pr-4 py-3 bg-[#161D2E] border border-slate-800 rounded-xl focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm text-slate-100 placeholder-slate-600 transition" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-xs font-semibold text-slate-300 tracking-wide">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-[11px] font-semibold text-blue-400 hover:text-blue-300 transition">
                                    Forgot?
                                </a>
                            @endif
                        </div>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" 
                                class="w-full pl-11 pr-4 py-3 bg-[#161D2E] border border-slate-800 rounded-xl focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm text-slate-100 placeholder-slate-600 tracking-widest transition" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <input type="hidden" name="remember" value="1">

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 via-indigo-600 to-teal-500 hover:opacity-95 text-white font-semibold py-3 px-4 rounded-xl shadow-[0_4px_25px_rgba(37,99,235,0.25)] transition flex items-center justify-center gap-2 text-sm">
                            <span>Sign in</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </form>
                <div class="mt-8 text-center">
                    <p class="text-xs font-medium text-slate-400">
                        Don't have an account yet? 
                        <a href="{{ route('register') }}" class="text-blue-400 font-bold hover:underline ms-1">Register</a>
                    </p>
                </div>
            </div>

            <div class="mt-auto pt-8 flex flex-col items-center gap-1.5 text-[11px] text-slate-500 font-medium">
                <span>&copy; {{ date('Y') }} CandidatureTracker. Developed for future leaders.</span>
                <div class="flex items-center gap-3 text-slate-400">
                    <a href="#" class="hover:underline">Support</a>
                    <span class="text-slate-700">•</span>
                    <a href="#" class="hover:underline">Privacy</a>
                    <span class="text-slate-700">•</span>
                    <a href="#" class="hover:underline">Terms</a>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>