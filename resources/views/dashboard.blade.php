<x-app-layout>
    <div class="flex min-h-screen w-full bg-[#F8F9FC]">
        
        <aside class="w-20 bg-white border-r border-slate-200/80 flex flex-col items-center justify-between py-6 shrink-0 z-20">
            <div class="flex flex-col items-center gap-8 w-full">
                <div class="w-10 h-10 bg-[#7C3AED] rounded-xl flex items-center justify-center text-white shadow-lg shadow-purple-500/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>

                <nav class="flex flex-col items-center gap-4 w-full px-2">
                    <a href="{{ route('dashboard') }}" class="w-12 h-12 bg-[#F3E8FF] text-[#7C3AED] rounded-xl flex items-center justify-center transition-all duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </a>
                    <a href="#" class="w-12 h-12 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-xl flex items-center justify-center transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1h16a1 1 0 011 1v8zM12 11V3m0 8l-4-4m4 4l4-4" />
                        </svg>
                    </a>
                    <a href="#" class="w-12 h-12 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-xl flex items-center justify-center transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </a>
                    <a href="#" class="w-12 h-12 text-slate-400 hover:text-slate-600 hover:bg-slate-50 rounded-xl flex items-center justify-center transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </a>
                </nav>
            </div>

            <div class="flex flex-col items-center gap-5 w-full px-2">
                <a href="{{ route('profile.edit') }}" class="w-12 h-12 text-slate-400 hover:text-slate-600 rounded-xl flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </a>
                <hr class="w-8 border-slate-200">
                <div class="w-10 h-10 rounded-full bg-purple-600 text-white flex items-center justify-center text-xs font-bold uppercase shadow-sm select-none">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            
            <header class="h-16 bg-white border-b border-slate-200/80 px-8 flex items-center justify-between z-10">
                <div class="w-96 relative flex items-center">
                    <span class="absolute left-3.5 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" placeholder="Search a company, a role..." 
                        class="w-full bg-slate-50 text-sm placeholder-slate-400 pl-10 pr-4 py-2 border-0 rounded-xl focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition duration-150">
                </div>

                <div class="flex items-center gap-4">
                    <button class="w-10 h-10 rounded-xl hover:bg-slate-50 border border-slate-200/60 flex items-center justify-center text-slate-500 relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-[#EF4444] rounded-full border border-white"></span>
                    </button>

                    <button class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-semibold text-sm px-4 py-2 rounded-xl shadow-md shadow-purple-500/10 flex items-center gap-2 transition duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>New Application</span>
                    </button>
                </div>
            </header>

            <main class="flex-1 p-8 max-w-[1400px] w-full mx-auto space-y-6">

                <section class="relative bg-gradient-to-br from-[#F5F0FF] via-[#F4EFFF] to-[#EBE4FF] border border-purple-100/80 rounded-3xl p-8 sm:p-10 flex flex-col md:flex-row justify-between items-start md:items-center overflow-hidden">
                    <div class="absolute -right-16 -bottom-16 w-80 h-80 bg-white/40 rounded-full blur-3xl pointer-events-none"></div>
                    
                    <div class="max-w-xl space-y-4 relative z-10">
                        <span class="text-xs font-bold text-[#7C3AED] tracking-wider uppercase">Graduate Dashboard v2.0</span>
                        <h1 class="text-3xl font-extrabold text-[#1E1B4B] tracking-tight leading-tight">
                            Welcome back, <br class="sm:hidden">{{ Auth::user()->name }}!
                        </h1>
                        <p class="text-slate-600 text-sm sm:text-base font-medium leading-relaxed">
                            Manage your opportunities, track your ongoing interviews, and propel your career towards new heights with your dedicated platform.
                        </p>
                        <div class="flex items-center gap-3 pt-2">
                            <button class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-lg shadow-purple-500/10 transition">
                                Get Started
                            </button>
                            <button class="bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs font-bold px-5 py-2.5 rounded-xl shadow-sm transition flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                <span>Import applications</span>
                            </button>
                        </div>
                    </div>

                    <div class="hidden lg:block relative shrink-0 z-10 w-44 h-28 bg-white rounded-2xl border border-purple-100/50 p-4 shadow-xl shadow-purple-950/5 transform translate-y-2">
                        <div class="flex items-center justify-between">
                            <span class="w-6 h-6 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span class="w-12 h-2.5 bg-slate-100 rounded-full"></span>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="w-full h-1.5 bg-slate-100 rounded-full"></div>
                            <div class="w-3/4 h-1.5 bg-slate-100 rounded-full"></div>
                        </div>
                        <span class="absolute -top-1.5 -left-1.5 w-3 h-3 bg-purple-400 rounded-full animate-pulse"></span>
                    </div>
                </section>

                <section class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="bg-white border border-slate-200/60 p-6 rounded-2xl shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-50 text-[#7C3AED] rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-slate-400 block tracking-wide uppercase">Active applications</span>
                            <div class="flex items-baseline gap-1.5 mt-0.5">
                                <span class="text-2xl font-bold text-slate-900">12</span>
                                <span class="text-[11px] font-bold text-purple-600 bg-purple-50 px-1.5 py-0.5 rounded">+2 this week</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200/60 p-6 rounded-2xl shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-slate-400 block tracking-wide uppercase">Upcoming interviews</span>
                            <div class="flex items-baseline gap-1.5 mt-0.5">
                                <span class="text-2xl font-bold text-slate-900">4</span>
                                <span class="text-[11px] font-bold text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded">+1 next week</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200/60 p-6 rounded-2xl shadow-sm flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 01-2 2h-2a2 2 0 01-2-2zm9-1V4a2 2 0 00-2-2h-2a2 2 0 00-2 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-slate-400 block tracking-wide uppercase">Response rate</span>
                            <div class="flex items-baseline gap-1.5 mt-0.5">
                                <span class="text-2xl font-bold text-slate-900">24%</span>
                                <span class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded">+3% overall</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    
                    <div class="lg:col-span-2 bg-white border border-slate-200/60 rounded-2xl shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-purple-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <h3 class="text-base font-bold text-slate-900">Recent activity</h3>
                            </div>
                            <a href="#" class="text-xs font-bold text-purple-600 hover:text-purple-700 transition">View all</a>
                        </div>

                        <div class="divide-y divide-slate-100/70">
                            <div class="p-4 px-6 flex items-center justify-between hover:bg-slate-50/50 transition duration-150">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">Linear</h4>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5">Frontend Engineer</p>
                                </div>
                                <div class="flex items-center gap-8">
                                    <span class="px-2.5 py-1 text-[11px] font-bold text-blue-600 bg-blue-50 border border-blue-100/50 rounded-lg">Interview</span>
                                    <span class="text-xs font-semibold text-slate-400 w-24 text-right">14/10/2026</span>
                                </div>
                            </div>

                            <div class="p-4 px-6 flex items-center justify-between hover:bg-slate-50/50 transition duration-150">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">Vercel</h4>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5">Product Designer</p>
                                </div>
                                <div class="flex items-center gap-8">
                                    <span class="px-2.5 py-1 text-[11px] font-bold text-amber-600 bg-amber-50 border border-amber-100/50 rounded-lg">In progress</span>
                                    <span class="text-xs font-semibold text-slate-400 w-24 text-right">12/10/2026</span>
                                </div>
                            </div>

                            <div class="p-4 px-6 flex items-center justify-between hover:bg-slate-50/50 transition duration-150">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">Stripe</h4>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5">Software Engineer Grad</p>
                                </div>
                                <div class="flex items-center gap-8">
                                    <span class="px-2.5 py-1 text-[11px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-100/50 rounded-lg">Offer</span>
                                    <span class="text-xs font-semibold text-slate-400 w-24 text-right">10/10/2026</span>
                                </div>
                            </div>

                            <div class="p-4 px-6 flex items-center justify-between hover:bg-slate-50/50 transition duration-150">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900">Airbnb</h4>
                                    <p class="text-xs text-slate-400 font-medium mt-0.5">Junior Web Dev</p>
                                </div>
                                <div class="flex items-center gap-8">
                                    <span class="px-2.5 py-1 text-[11px] font-bold text-rose-600 bg-rose-50 border border-rose-100/50 rounded-lg">Refused</span>
                                    <span class="text-xs font-semibold text-slate-400 w-24 text-right">08/10/2026</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50 p-4 border-t border-slate-100 text-center flex items-center justify-center gap-2 text-xs font-semibold text-slate-400">
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                            <span>All tracking insights are synced and up-to-date.</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white border border-slate-200/60 rounded-2xl shadow-sm p-6 space-y-4">
                            <div class="flex items-center gap-2">
                                <span class="text-amber-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </span>
                                <h3 class="text-base font-bold text-slate-900">Tips of the day</h3>
                            </div>

                            <div class="space-y-3">
                                <h4 class="text-sm font-bold text-slate-900">Optimize your Resume / CV</h4>
                                <p class="text-xs text-slate-500 font-medium leading-relaxed">
                                    Graduates who list explicit open-source projects or live web deployments increase their initial technical response rates by up to 15%.
                                </p>
                            </div>

                            <div class="space-y-2 pt-2">
                                <a href="#" class="w-full bg-slate-50 hover:bg-slate-100 p-3 rounded-xl border border-slate-200/40 flex items-center justify-between text-xs font-bold text-slate-700 transition">
                                    <span>Add an open GitHub link</span>
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200/60 rounded-2xl shadow-sm p-6 flex flex-col items-center text-center justify-center min-h-[160px] relative overflow-hidden">
                            <div class="w-10 h-10 bg-slate-50 border border-slate-200/60 text-slate-400 rounded-full flex items-center justify-center font-bold text-lg mb-3">
                                <span>+</span>
                            </div>
                            <h4 class="text-sm font-bold text-slate-900">New Goal Target</h4>
                            <p class="text-xs text-slate-400 font-medium max-w-[200px] mt-1">
                                Define your customized career milestone targets to unlock specialized tactical advice.
                            </p>
                        </div>
                    </div>

                </section>
            </main>

            <footer class="mt-auto border-t border-slate-200/80 bg-white px-8 py-4 flex flex-col sm:flex-row items-center justify-between text-[11px] font-semibold text-slate-400 gap-3">
                <span>&copy; {{ date('Y') }} CandidatureTracker. Made with passion for the future talent ecosystem.</span>
                <div class="flex items-center gap-4 text-slate-500">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <a href="#" class="hover:underline">Legal Notice</a>
                </div>
            </footer>

        </div>
    </div>
</x-app-layout>