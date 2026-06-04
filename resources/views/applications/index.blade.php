<x-app-layout>
    <div class="max-w-7xl mx-auto px-8 mt-8 pb-12">
        
        <!-- 1. Stats Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Active Applications -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm transition hover:shadow-md">
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Active Trackers</p>
                <div class="flex items-center justify-between mt-2">
                    <h4 class="text-3xl font-black text-slate-800">{{ $activeApplications }}</h4>
                    <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-[#7C3AED]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                </div>
            </div>

            <!-- Upcoming Interviews -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm transition hover:shadow-md">
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Upcoming Interviews</p>
                <div class="flex items-center justify-between mt-2">
                    <h4 class="text-3xl font-black text-[#7C3AED]">{{ $upcomingInterviews }}</h4>
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Response Rate -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm transition hover:shadow-md">
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Response Rate</p>
                <div class="flex items-center justify-between mt-2">
                    <h4 class="text-3xl font-black text-slate-800">{{ $responseRate }}%</h4>
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Filters & Actions Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <form action="{{ route('applications.index') }}" method="GET" class="flex flex-wrap items-center gap-3">
                <!-- Status Filter -->
                <select name="status" onchange="this.form.submit()" class="bg-white border border-slate-200 text-slate-600 text-xs font-bold px-4 py-2.5 rounded-xl focus:ring-2 focus:ring-purple-500/20 outline-none transition">
                    <option value="">All Statuses</option>
                    @foreach($statusLabels as $value => $label)
                        <option value="{{ $value }}" {{ $currentStatus == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>

                <!-- Priority Filter -->
                <select name="priority" onchange="this.form.submit()" class="bg-white border border-slate-200 text-slate-600 text-xs font-bold px-4 py-2.5 rounded-xl focus:ring-2 focus:ring-purple-500/20 outline-none transition">
                    <option value="">All Priorities</option>
                    @foreach($priorityLabels as $value => $label)
                        <option value="{{ $value }}" {{ $currentPriority == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </form>

            <a href="{{ route('applications.create') }}" class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white text-xs font-bold px-6 py-3 rounded-xl transition shadow-lg shadow-purple-500/20 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                New Application
            </a>
        </div>

        <!-- 3. Recent Activity List (Matches image_e76dfa.png) -->
        <div class="bg-white border border-slate-200/60 rounded-3xl shadow-sm overflow-hidden">
            <div class="px-8 py-6 flex items-center justify-between border-b border-slate-50">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#7C3AED]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="font-bold text-slate-800">Recent activity</h3>
                </div>
            </div>

            <div class="divide-y divide-slate-50">
                @forelse($applications as $application)
                    <div class="px-8 py-5 flex items-center justify-between hover:bg-slate-50/50 transition-colors group">
                        <!-- Company and Position -->
                        <div class="flex flex-col">
                            <span class="font-bold text-slate-800 text-sm group-hover:text-[#7C3AED] transition-colors">{{ $application->company }}</span>
                            <span class="text-slate-400 text-xs font-medium">{{ $application->position }}</span>
                        </div>

                        <!-- Status & Date Container -->
                        <div class="flex items-center gap-12">
                            <!-- Status Badge -->
                            <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest
                                @if($application->status === 'interview') bg-blue-50 text-blue-600 
                                @elseif($application->status === 'offer') bg-emerald-50 text-emerald-600
                                @elseif(in_array($application->status, ['refused', 'rejected'])) bg-red-50 text-red-600
                                @else bg-amber-50 text-amber-600 @endif">
                                {{ $application->status }}
                            </span>

                            <!-- Date (Formatted as 14/10/2026) -->
                            <span class="text-slate-400 text-xs font-bold w-24 text-right">
                                {{ $application->applied_at ? \Carbon\Carbon::parse($application->applied_at)->format('d/m/Y') : 'N/A' }}
                            </span>

                            <!-- View Link -->
                            <a href="{{ route('applications.show', $application->id) }}" class="text-slate-300 hover:text-[#7C3AED] transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-16 text-center">
                        <p class="text-slate-400 text-sm font-medium italic">No applications found matching your current filters.</p>
                    </div>
                @endforelse
            </div>

            <!-- Footer Meta -->
            <div class="bg-slate-50/30 px-8 py-4 border-t border-slate-50 flex justify-center items-center gap-2">
                <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                <p class="text-[11px] text-slate-400 font-bold tracking-tight">All tracking insights are synced and up-to-date.</p>
            </div>
        </div>
    </div>
</x-app-layout>