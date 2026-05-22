{{-- @extends('layouts.app')  --}}
{{-- Or your main layout wrapper --}}

{{-- @section('content') --}}
<x-app-layout>
<div class="min-h-screen bg-[#F8FAFC] pb-12">
    <header class="bg-white border-b border-slate-100  z-10 px-8 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="relative w-80">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input type="text" placeholder="Rechercher une entreprise, un rôle..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200/80 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#7C3AED]/20 focus:border-[#7C3AED] transition">
            </div>

            <div class="flex items-center gap-4">
                <button type="button" class="w-10 h-10 rounded-xl hover:bg-slate-50 border border-slate-200/60 flex items-center justify-center text-slate-500 relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-[#EF4444] rounded-full border border-white"></span>
                </button>

                <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                    @csrf
                    <button type="submit" class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-semibold text-sm px-4 py-2 rounded-xl shadow-md shadow-purple-500/10 flex items-center gap-2 transition duration-150 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        <span>Log out</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-8 mt-8">

        <div class="w-1/6 mb-8 mx-5">
            <a href="{{ route('dashboard') }}" class="text-black/60 text-xs font-bold transition duration-150 tracking-wider underline underline-offset-1">
                    Back
            </a>
        </div>

        <div class="bg-gradient-to-r from-purple-50 via-indigo-50/30 to-white border border-purple-100/50 rounded-3xl p-8 relative overflow-hidden shadow-sm mb-8">
            <div class="relative z-10 max-w-2xl">
                <span class="text-xs font-bold tracking-wider text-[#7C3AED] uppercase block mb-1">GRADUATE DASHBOARD v1.0</span>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Bienvenue sur <span class="text-[#7C3AED]">CandidatureTracker</span></h1>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Gérez vos opportunités, suivez vos entretiens et propulsez votre carrière vers de nouveaux sommets grâce à notre plateforme dédiée aux jeunes diplômés.</p>
                
                <div class="flex items-center gap-3">
                    <a href="{{ route('applications.create') }}" class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white text-xs font-bold px-5 py-3 rounded-xl shadow-lg shadow-purple-500/20 transition duration-150">
                        + Nouveau Suivi
                    </a>
                    <button type="button" class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-xs font-semibold px-4 py-3 rounded-xl transition flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Importer des candidatures
                    </button>
                </div>
            </div>
            <div class="absolute right-12 bottom-0 w-64 h-40 bg-white/60 border-t border-l border-slate-100 rounded-tl-2xl shadow-inner hidden md:block">
                <div class="p-4 space-y-2">
                    <div class="h-3 w-1/2 bg-slate-200/70 rounded"></div>
                    <div class="h-3 w-3/4 bg-slate-100 rounded"></div>
                    <div class="h-7 w-8 bg-purple-200/50 rounded-full mt-4 ml-auto"></div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200/60 rounded-2xl p-4 mb-8 shadow-sm flex flex-wrap items-center justify-between gap-4">
            <form method="GET" action="{{ route('applications.index') }}" class="w-full flex flex-wrap items-center justify-between gap-4 m-0">
                <div class="flex flex-wrap items-center gap-3">
                    <div class="flex items-center gap-2">
                        <label for="status" class="text-xs font-bold text-slate-400 uppercase tracking-wider">Statut:</label>
                        <select name="status" id="status" onchange="this.form.submit()" class="bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7C3AED]/20">
                            <option value="">Tous les statuts</option>
                            @foreach($statusLabels as $value => $label)
                                <option value="{{ $value }}" {{ $currentStatus == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center gap-2">
                        <label for="priority" class="text-xs font-bold text-slate-400 uppercase tracking-wider">Priorité:</label>
                        <select name="priority" id="priority" onchange="this.form.submit()" class="bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7C3AED]/20">
                            <option value="">Toutes les priorités</option>
                            @foreach($priorityLabels as $value => $label)
                                <option value="{{ $value }}" {{ $currentPriority == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @if($currentStatus || $currentPriority)
                    <a href="{{ route('applications.index') }}" class="text-xs font-bold text-[#7C3AED] hover:text-[#6D28D9] flex items-center gap-1 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Réinitialiser les filtres
                    </a>
                @endif
            </form>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <div class="lg:col-span-2 bg-white border border-slate-200/60 rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="font-bold text-slate-800 tracking-tight flex items-center gap-2">
                        <span class="w-2 h-2 bg-[#7C3AED] rounded-full"></span>
                        Activité récente
                    </h2>
                    <span class="text-xs text-slate-400 font-medium">Total: {{ $applications->count() }} opportunité(s)</span>
                </div>

                @if($applications->isEmpty())
                    <div class="p-12 text-center text-slate-400">
                        <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        <p class="text-sm font-medium">Aucune candidature trouvée correspondant à vos critères.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                    <th class="py-3 px-6">Entreprise & Poste</th>
                                    <th class="py-3 px-6 text-center">Priorité</th>
                                    <th class="py-3 px-6 text-center">Statut</th>
                                    <th class="py-3 px-6 text-right">Date</th>
                                    <th class="py-3 px-6 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm">
                                @foreach($applications as $application)
                                    <tr class="hover:bg-slate-50/80 transition duration-100 group">
                                        <td class="py-4 px-6">
                                            <div class="font-bold text-slate-800 group-hover:text-[#7C3AED] transition-colors">
                                                {{ $application->company }}
                                            </div>
                                            <div class="text-xs text-slate-400 font-medium mt-0.5">
                                                {{ $application->position }}
                                            </div>
                                        </td>

                                        <td class="py-4 px-6 text-center whitespace-nowrap">
                                            @php
                                                $priorityClass = match($application->priority) {
                                                    'high', 'haute' => 'bg-rose-50 text-rose-600 border-rose-100',
                                                    'medium', 'moyenne' => 'bg-amber-50 text-amber-600 border-amber-100',
                                                    default => 'bg-slate-50 text-slate-500 border-slate-100',
                                                };
                                            @endphp
                                            <span class="inline-block px-2.5 py-0.5 text-xs font-semibold rounded-lg border {{ $priorityClass }}">
                                                {{ $priorityLabels[$application->priority] ?? $application->priority }}
                                            </span>
                                        </td>

                                        <td class="py-4 px-6 text-center whitespace-nowrap">
                                            @php
                                                $statusClass = match($application->status) {
                                                    'interview', 'entretien' => 'bg-sky-500 text-white',
                                                    'offer', 'offre' => 'bg-emerald-500 text-white',
                                                    'rejected', 'refuse' => 'bg-rose-500 text-white',
                                                    default => 'bg-slate-200 text-slate-700',
                                                };
                                            @endphp
                                            <span class="inline-block px-3 py-0.5 text-xs font-bold rounded-full shadow-sm {{ $statusClass }}">
                                                {{ $statusLabels[$application->status] ?? $application->status }}
                                            </span>
                                        </td>

                                        <td class="py-4 px-6 text-right text-xs font-semibold text-slate-400/90 whitespace-nowrap">
                                            {{ $application->created_at ? $application->created_at->format('d/m/Y') : 'N/A' }}
                                        </td>

                                        <td class="py-4 px-6 text-right whitespace-nowrap">
                                            <div class="flex items-center justify-end gap-1.5">
                                                
                                                <a href="{{ route('applications.edit', $application->id) }}" 
                                                   class="w-8 h-8 text-slate-400 hover:text-[#7C3AED] hover:bg-purple-50 rounded-xl flex items-center justify-center transition duration-150" 
                                                   title="Modifier">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                <form method="POST" action="{{ route('applications.destroy', $application->id) }}" 
                                                      class="inline m-0 p-0" 
                                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette candidature ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="w-8 h-8 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl flex items-center justify-center transition duration-150 cursor-pointer" 
                                                            title="Supprimer">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="px-6 py-2 bg-slate-50/50 border-t border-slate-100 text-center text-xs text-slate-400 font-medium">
                    ✨ Toutes vos informations sont à jour pour aujourd'hui.
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white border border-slate-200/60 rounded-2xl p-6 shadow-sm">
                    <h3 class="font-bold text-slate-800 text-sm tracking-tight mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        Conseils du jour
                    </h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-slate-50/70 border border-slate-100 rounded-xl">
                            <h4 class="text-xs font-bold text-slate-700 mb-1">Optimisez votre CV</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">Les diplômés qui mentionnent des projets Open Source augmentent leur taux de réponse de 15%.</p>
                            <div class="mt-3 flex gap-2">
                                <button class="w-full bg-white border border-slate-200 text-[11px] font-bold text-slate-600 py-1.5 px-3 rounded-lg hover:bg-slate-50 flex items-center justify-between transition">
                                    Ajouter GitHub <span class="text-slate-400">↗</span>
                                </button>
                                <button class="w-full bg-white border border-slate-200 text-[11px] font-bold text-slate-600 py-1.5 px-3 rounded-lg hover:bg-slate-50 flex items-center justify-between transition">
                                    Guide Portfolio <span class="text-slate-400">↗</span>
                                </button>
                            </div>
                        </div>

                        <div class="border-2 border-dashed border-slate-200 hover:border-purple-300 rounded-xl p-6 text-center cursor-pointer transition group">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-slate-100 text-slate-400 group-hover:bg-purple-50 group-hover:text-[#7C3AED] transition text-lg font-bold mb-2">+</span>
                            <h4 class="text-xs font-bold text-slate-700 mb-0.5">Nouvel Objectif</h4>
                            <p class="text-[11px] text-slate-400">Définissez vos objectifs de carrière pour recevoir des conseils personnalisés.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
</x-app-layout>
{{-- @endsection --}}