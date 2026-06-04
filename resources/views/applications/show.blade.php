<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] pb-12">

        <main class="max-w-7xl mx-auto px-8 mt-6">
            <div class="mb-6">
                <a href="{{ route('applications.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-[#7C3AED] text-xs font-bold transition duration-150 tracking-wider">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                    BACK TO APPLICATIONS
                </a>
            </div>

            <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-950 rounded-3xl p-8 relative overflow-hidden shadow-xl mb-8 border border-slate-700/50">
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <span class="text-xs font-bold tracking-widest text-indigo-400 uppercase block mb-2">Application Details</span>
                        <h1 class="text-3xl font-extrabold text-white tracking-tight mb-2">{{ $application->company }}</h1>
                        <p class="text-slate-300 text-sm font-semibold flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            {{ $application->position }}
                        </p>
                    </div>
                    
                    <div class="flex items-center gap-3 self-start md:self-center">
                        <!-- Update Button -->
                        <a href="{{ route('applications.edit', $application->id) }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/10 text-xs font-bold px-5 py-3 rounded-xl transition duration-150 shadow-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Update Opportunity
                        </a>
                        <!-- Archive Button (Assuming a route or method exists) -->
                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-white/10 hover:bg-rose-500/20 text-white border border-white/10 text-xs font-bold px-5 py-3 rounded-xl transition duration-150 shadow-sm flex items-center gap-2 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M10 8V4a1 1 0 011-1h2a1 1 0 011 1v4M14 11l-4 4m0-4l4 4m-9 3h10a2 2 0 002-2V8H5v10a2 2 0 002 2z" />
                                </svg>
                                Archive Opportunity
                            </button>
                        </form>
                    </div>
                </div>
                <div class="absolute -right-20 -top-20 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <div class="lg:col-span-2 bg-white border border-slate-200/60 rounded-3xl p-6 shadow-sm">
                    
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <div>
                            <h2 class="font-bold text-slate-800 tracking-tight flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-[#7C3AED] rounded-full animate-pulse"></span>
                                Recruitment Steps
                            </h2>
                            <p class="text-[11px] text-slate-400 font-medium mt-0.5">Chronological tracking of interviews</p>
                        </div>
                        
                        <!-- Add Interview Button -->
                        <a href="{{ route('interviews.create', $application->id) }}" 
                           class="bg-slate-50 hover:bg-[#7C3AED] text-slate-600 hover:text-white font-bold text-xs px-4 py-2.5 rounded-xl border border-slate-200/40 flex items-center gap-1.5 transition duration-150 cursor-pointer shadow-sm">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Add Interview</span>
                        </a>
                    </div>

                    @if($application->interviews->isEmpty())
                        <div class="py-16 text-center">
                            <div class="w-14 h-14 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 border border-slate-100">
                                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-slate-400">No interviews scheduled yet.</p>
                        </div>
                    @else
                        <div class="relative pl-4 border-l-2 border-slate-100 space-y-6 ml-2">
                            @foreach($application->interviews->sortBy('datetime') as $interview)
                                <div class="relative group">
                                    <span class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full ring-4 ring-white shadow-sm {{ $interview->result_color }} flex items-center justify-center"></span>

                                    <div class="bg-slate-50/50 hover:bg-slate-50 border border-slate-100 hover:border-slate-200/80 rounded-2xl p-4 transition duration-150">
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <span class="text-xs font-bold text-slate-800 tracking-tight">{{ $interview->type_label }}</span>
                                                <div class="text-[11px] text-slate-400 font-semibold mt-0.5 flex items-center gap-1">
                                                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span>{{ $interview->datetime ? $interview->datetime->format('d/m/Y at H:i') : 'Date not set' }}</span>
                                                </div>
                                            </div>
                                            
                                            <span class="text-[10px] font-black uppercase px-2.5 py-0.5 rounded-md tracking-wider border bg-white shadow-sm text-slate-500">
                                                {{ $interview->result_label }}
                                            </span>
                                        </div>

                                        @if($interview->notes)
                                            <p class="mt-2.5 text-xs text-slate-500 font-medium leading-relaxed bg-white border border-slate-100 rounded-xl p-3 shadow-inner">
                                                {{ $interview->notes }}
                                            </p>
                                        @endif

                                        <div class="mt-3 pt-2 border-t border-slate-100/60 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                            <a href="{{ route('interviews.edit', $interview->id) }}" class="p-1.5 text-slate-400 hover:text-[#7C3AED] hover:bg-purple-50 rounded-lg transition flex items-center gap-1 text-[11px] font-bold">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('interviews.destroy', $interview->id) }}" method="POST" 
                                            onsubmit="return confirm('Are you sure you want to delete this interview?');" 
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" 
                                                    class="p-1.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition inline-flex items-center gap-1 text-[11px] font-bold">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.34 6.6m-2.77 0-.34-6.6M9.25 12h5.5M4.75 6.75h14.5M5.25 6.75l.85 12c.07.97.87 1.75 1.85 1.75h8.1c.98 0 1.78-.78 1.85-1.75l.85-12M9.75 3.75h4.5a.75.75 0 0 1 .75.75v.75h-6V4.5a.75.75 0 0 1 .75-.75Z" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div class="bg-white border border-slate-200/60 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-slate-800 text-sm tracking-tight mb-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tracking Details
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="p-3.5 bg-slate-50/60 border border-slate-100 rounded-xl flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status</span>
                                <span class="px-3 py-0.5 text-[10px] font-black uppercase rounded-full bg-indigo-500 text-white">
                                    {{ $application->status }}
                                </span>
                            </div>

                            <div class="p-3.5 bg-slate-50/60 border border-slate-100 rounded-xl flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Priority</span>
                                <span class="px-2.5 py-0.5 text-[10px] font-black uppercase rounded-md border bg-white shadow-sm text-slate-700">
                                    {{ $application->priority }}
                                </span>
                            </div>

                            <div class="p-3.5 bg-slate-50/60 border border-slate-100 rounded-xl flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Created on</span>
                                <span class="text-xs font-bold text-slate-700">
                                    {{ $application->created_at ? $application->created_at->format('d/m/Y') : 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>