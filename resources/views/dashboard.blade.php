<x-app-layout>
    <div class="flex min-h-screen w-full bg-[#F8F9FC]">
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            <main class="flex-1 p-8 max-w-[1400px] w-full mx-auto space-y-8">

                <!-- Welcome Section -->
                <section
                    class="relative bg-gradient-to-br from-[#F5F0FF] via-[#F4EFFF] to-[#EBE4FF] border border-purple-100/80 rounded-3xl p-8 sm:p-10 flex flex-col md:flex-row justify-between items-start md:items-center overflow-hidden">
                    <div
                        class="absolute -right-16 -bottom-16 w-80 h-80 bg-white/40 rounded-full blur-3xl pointer-events-none">
                    </div>

                    <div class="max-w-xl space-y-4 relative z-10">
                        <span class="text-xs font-bold text-[#7C3AED] tracking-wider uppercase">Graduate Dashboard
                            v2.0</span>
                        <h1 class="text-3xl font-extrabold text-[#1E1B4B] tracking-tight leading-tight">
                            Welcome back, <br class="sm:hidden">{{ Auth::user()->name }}!
                        </h1>
                        <p class="text-slate-600 text-sm sm:text-base font-medium leading-relaxed">
                            Manage your opportunities, track your ongoing interviews, and propel your career towards new
                            heights.
                        </p>
                        <div class="flex items-center gap-3 pt-2">
                            <a href="{{ route('applications.index') }}"
                                class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white text-xs font-bold px-6 py-3 rounded-xl shadow-lg shadow-purple-500/20 transition transform hover:-translate-y-0.5">
                                View Applications
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Stats Grid -->
                <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Active Applications -->
                    <div
                        class="bg-white border border-slate-200/60 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-purple-50 text-[#7C3AED] rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-slate-400 block tracking-wide uppercase">Active
                                Applications</span>
                            <div class="flex items-baseline gap-2 mt-0.5">
                                <span class="text-2xl font-bold text-slate-900">{{ $activeApplications }}</span>
                                <span
                                    class="text-[10px] font-bold text-purple-600 bg-purple-50 px-2 py-0.5 rounded-full">Ongoing</span>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Interviews -->
                    <div
                        class="bg-white border border-slate-200/60 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <span
                                class="text-xs font-semibold text-slate-400 block tracking-wide uppercase">Interviews</span>
                            <div class="flex items-baseline gap-2 mt-0.5">
                                <span class="text-2xl font-bold text-slate-900">{{ $upcomingInterviews }}</span>
                                <span
                                    class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full">Scheduled</span>
                            </div>
                        </div>
                    </div>

                    <!-- Response Rate -->
                    <div
                        class="bg-white border border-slate-200/60 p-6 rounded-2xl shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 01-2 2h-2a2 2 0 01-2-2zm9-1V4a2 2 0 00-2-2h-2a2 2 0 00-2 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-slate-400 block tracking-wide uppercase">Response
                                Rate</span>
                            <div class="flex items-baseline gap-2 mt-0.5">
                                <span class="text-2xl font-bold text-slate-900">{{ $responseRate }}%</span>
                                <span
                                    class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">Global</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Content Grid -->
                <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                    <!-- Real Recent Activity Loop -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Section Header -->
                        <div class="flex items-center justify-between px-2">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900">Application Pipeline</h3>
                                <p class="text-xs text-slate-500 font-medium">Your 3 most recent movements</p>
                            </div>
                            <a href="{{ route('applications.index') }}"
                                class="text-xs font-bold text-purple-600 bg-purple-50 px-4 py-2 rounded-xl hover:bg-purple-100 transition">
                                View Full Tracker
                            </a>
                        </div>

                        <!-- Horizontal Scroll/Grid Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @forelse($recentApplications as $app)
                                <div
                                    class="bg-white border border-slate-200/60 p-5 rounded-3xl shadow-sm hover:shadow-md transition-all group relative overflow-hidden">
                                    <!-- Status Bar Decorator -->
                                    @php
                                        $statusConfig = [
                                            'interview' => ['color' => 'bg-blue-500', 'label' => 'Next: Prepare'],
                                            'pending' => ['color' => 'bg-amber-500', 'label' => 'Awaiting Response'],
                                            'offer' => ['color' => 'bg-emerald-500', 'label' => 'Decision Needed'],
                                            'rejected' => ['color' => 'bg-rose-500', 'label' => 'Closed'],
                                        ];
                                        $currentStatus = strtolower($app->status);
                                        $config = $statusConfig[$currentStatus] ?? ['color' => 'bg-slate-400', 'label' => 'Status: ' . $app->status];
                                    @endphp

                                    <div class="absolute top-0 left-0 w-1.5 h-full {{ $config['color'] }}"></div>

                                    <div class="flex justify-between items-start mb-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center border border-slate-100 font-bold text-slate-400 text-sm">
                                            {{ substr($app->company_name, 0, 1) }}
                                        </div>
                                        <span
                                            class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter italic">
                                            {{ $app->created_at->diffForHumans() }}
                                        </span>
                                    </div>

                                    <div class="space-y-1">
                                        <h4 class="text-base font-extrabold text-slate-900 truncate">
                                            {{ $app->company_name }}</h4>
                                        <p class="text-sm text-slate-500 font-medium">{{ $app->job_title }}</p>
                                    </div>

                                    <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Status</span>
                                            <span
                                                class="text-xs font-bold text-slate-800">{{ ucfirst($app->status) }}</span>
                                        </div>

                                        <div class="text-right">
                                            <span
                                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">{{ $config['label'] }}</span>
                                            <a href="{{ route('applications.show', $app->id) }}"
                                                class="text-xs font-bold text-purple-600 hover:underline">
                                                Details →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="col-span-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl p-12 text-center">
                                    <p class="text-slate-400 font-bold uppercase text-xs tracking-widest">The pipeline is
                                        empty</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Sidebar Info -->
                    <div class="space-y-6">
                        <!-- Tip Card -->
                        <div class="bg-white border border-slate-200/60 rounded-2xl shadow-sm p-6 space-y-4">
                            <div class="flex items-center gap-2">
                                <span class="text-amber-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </span>
                                <h3 class="text-base font-bold text-slate-900">Career Tip</h3>
                            </div>
                            <div class="space-y-3">
                                <h4 class="text-sm font-bold text-slate-800">Showcase Your Work</h4>
                                <p class="text-xs text-slate-500 leading-relaxed">
                                    Listing live deployments or open-source contributions can significantly increase
                                    your response rates.
                                </p>
                            </div>
                            <a href="#"
                                class="inline-flex w-full items-center justify-between bg-slate-50 hover:bg-slate-100 p-3 rounded-xl border border-slate-200/40 text-xs font-bold text-slate-700 transition">
                                <span>Update GitHub Link</span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer
                class="mt-auto border-t border-slate-200/80 bg-white px-8 py-4 flex flex-col sm:flex-row items-center justify-between text-[11px] font-bold text-slate-400 gap-3">
                <span>&copy; {{ date('Y') }} InterviewPrep. All rights reserved.</span>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-purple-600 transition">Privacy Policy</a>
                    <a href="#" class="hover:text-purple-600 transition">Terms of Service</a>
                </div>
            </footer>
        </div>
    </div>
</x-app-layout>