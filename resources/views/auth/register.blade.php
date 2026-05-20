<x-guest-layout>
    <div class="fixed inset-0 min-h-screen w-screen flex justify-center bg-[#0B0F17] text-white font-sans overflow-x-hidden">
        <div class="w-full lg:w-1/2 flex flex-col justify-between p-8 sm:p-12 relative items-center justify-center">
            
            <div class="w-full max-w-md bg-[#111622] border border-slate-800/80 rounded-2xl p-8 sm:p-10 shadow-2xl shadow-black/40 my-auto">
                
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-white tracking-tight">Create your account</h2>
                    <p class="text-slate-400 text-xs font-medium mt-1.5">Join us and start tracking your path effortlessly.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div class="space-y-1">
                        <label for="name" class="text-xs font-semibold text-slate-300 tracking-wide">Full name</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe" 
                                class="w-full pl-11 pr-4 py-2.5 bg-[#161D2E] border border-slate-800 rounded-xl focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm text-slate-100 placeholder-slate-600 transition" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div class="space-y-1">
                        <label for="email" class="text-xs font-semibold text-slate-300 tracking-wide">Email address</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="name@example.com" 
                                class="w-full pl-11 pr-4 py-2.5 bg-[#161D2E] border border-slate-800 rounded-xl focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm text-slate-100 placeholder-slate-600 transition" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="text-xs font-semibold text-slate-300 tracking-wide">Password</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" 
                                class="w-full pl-11 pr-4 py-2.5 bg-[#161D2E] border border-slate-800 rounded-xl focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm text-slate-100 placeholder-slate-600 tracking-widest transition" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirmation" class="text-xs font-semibold text-slate-300 tracking-wide">Confirm password</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 15H19M9 11l3-3 3 3m-3-3v8" />
                                </svg>
                            </span>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" 
                                class="w-full pl-11 pr-4 py-2.5 bg-[#161D2E] border border-slate-800 rounded-xl focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm text-slate-100 placeholder-slate-600 tracking-widest transition" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <div class="pt-3">
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-500 via-indigo-600 to-teal-500 hover:opacity-95 text-white font-semibold py-3 px-4 rounded-xl shadow-[0_4px_25px_rgba(37,99,235,0.25)] transition flex items-center justify-center gap-2 text-sm">
                            <span>Create account</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-xs font-medium text-slate-400">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-400 font-bold hover:underline ms-1">Log in</a>
                    </p>
                </div>
            </div>

            <div class="mt-auto pt-6 flex flex-col items-center gap-1.5 text-[11px] text-slate-500 font-medium">
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