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
                    <a href="{{ route('applications.index') }}" class="w-12 h-12 text-[#7C3AED] bg-purple-50 rounded-xl flex items-center justify-center transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </a>
                </nav>
            </div>
            <div class="flex flex-col items-center gap-5 w-full px-2">
                <div class="w-10 h-10 rounded-full bg-purple-600 text-white flex items-center justify-center text-xs font-bold uppercase shadow-sm">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            <header class="h-16 bg-white border-b border-slate-200/80 px-8 flex items-center justify-between z-10">
                <div class="w-96 relative flex items-center">
                    <span class="absolute left-3.5 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </span>
                    <input type="text" placeholder="Rechercher une entreprise..." class="w-full bg-slate-50 text-sm placeholder-slate-400 pl-10 pr-4 py-2 border-0 rounded-xl focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition duration-150">
                </div>
                <div class="flex items-center gap-4">
                    <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                        @csrf
                        <button type="submit" class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-semibold text-sm px-4 py-2 rounded-xl shadow-md shadow-purple-500/10 flex items-center gap-2 transition duration-150">
                            <span>Log out</span>
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-8 max-w-[1200px] w-full mx-auto space-y-6">
                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-4 text-xs font-bold text-emerald-700 flex items-center gap-2 shadow-sm animate-fade-in">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex items-center gap-2 text-xs font-bold tracking-wide text-slate-400 uppercase">
                    <a href="{{ route('applications.index') }}" class="hover:text-[#7C3AED] transition">Candidatures</a>
                    <span>/</span>
                    <span class="text-[#7C3AED]">Détails du Suivi</span>
                </div>

                <div class="bg-white border border-slate-200/60 rounded-3xl p-6 sm:p-8 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="space-y-2">
                        <div class="flex flex-wrap items-center gap-3">
                            <h1 class="text-3xl font-extrabold text-[#1E1B4B] tracking-tight">{{ $application->company }}</h1>
                            
                            @php
                                $priorityClass = match($application->priority) {
                                    'high', 'haute' => 'bg-rose-50 text-rose-600 border-rose-100',
                                    'medium', 'moyenne' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    default => 'bg-slate-50 text-slate-500 border-slate-100',
                                };
                            @endphp
                            <span class="px-2.5 py-0.5 text-xs font-bold rounded-lg border {{ $priorityClass }}">
                                Priorité {{ $application->priority }}
                            </span>
                        </div>
                        <p class="text-slate-500 text-base font-semibold">{{ $application->position }}</p>
                    </div>

                    <div class="flex items-center gap-4">
                        @php
                            $statusClass = match($application->status) {
                                'interview', 'entretien' => 'bg-sky-500 text-white',
                                'offer', 'offre' => 'bg-emerald-500 text-white',
                                'rejected', 'refuse' => 'bg-rose-500 text-white',
                                default => 'bg-slate-200 text-slate-700',
                            };
                        @endphp
                        <div class="text-right hidden sm:block">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Statut Actuel</span>
                            <span class="text-xs text-slate-400 font-semibold">Mis à jour {{ $application->updated_at->diffForHumans() }}</span>
                        </div>
                        <span class="px-4 py-2 text-sm font-bold rounded-xl shadow-sm {{ $statusClass }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    
                    <div class="lg:col-span-2 space-y-6">
                        
                        <div class="bg-white border border-slate-200/60 rounded-3xl p-6 shadow-sm space-y-6">
                            <h3 class="text-sm font-extrabold text-slate-800 tracking-wide uppercase border-b border-slate-100 pb-3">Informations Générales</h3>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Date de Postulation</span>
                                    <p class="text-sm text-slate-700 font-bold">
                                        {{ $application->applied_at ? \Carbon\Carbon::parse($application->applied_at)->format('d F Y') : 'Non spécifiée' }}
                                    </p>
                                </div>

                                <div class="space-y-1">
                                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Lien de l'Offre</span>
                                    @if($application->url)
                                        <a href="{{ $application->url }}" target="_blank" class="text-sm text-[#7C3AED] hover:underline font-bold flex items-center gap-1.5">
                                            <span>Visiter le site de l'offre</span>
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        </a>
                                    @else
                                        <p class="text-sm text-slate-400 font-semibold">Aucun lien fourni</p>
                                    @endif
                                </div>
                            </div>

                            <div class="space-y-2 pt-2">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Notes & Remarques</span>
                                <div class="p-4 bg-slate-50/70 border border-slate-100 rounded-2xl text-xs sm:text-sm text-slate-600 leading-relaxed font-medium">
                                    {!! nl2br(e($application->notes ?? "Aucune remarque ou note personnelle n'a encore été ajoutée à cette fiche d'opportunité.")) !!}
                                </div>
                            </div>

                            <div class="space-y-2 pt-2">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Document Attaché</span>
                                @if($application->file_path)
                                    <div class="flex items-center justify-between p-3.5 bg-purple-50/50 border border-purple-100 rounded-xl">
                                        <div class="flex items-center gap-3">
                                            <span class="w-9 h-9 bg-purple-100 text-[#7C3AED] rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                            </span>
                                            <div>
                                                <span class="text-xs font-bold text-slate-700 block">Dossier de Candidature</span>
                                                <span class="text-[10px] text-slate-400 font-medium uppercase">Pièce jointe sécurisée</span>
                                            </div>
                                        </div>
                                        <a href="{{ asset('storage/' . $application->file_path) }}" target="_blank" class="bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2 border border-slate-200 rounded-lg shadow-sm transition">
                                            Ouvrir
                                        </a>
                                    </div>
                                @else
                                    <div class="p-4 border border-dashed border-slate-200 rounded-xl text-center text-xs font-medium text-slate-400">
                                        Aucun document (CV ou Lettre) n'est rattaché à ce suivi.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        
                        <div class="bg-white border border-slate-200/60 rounded-3xl p-6 shadow-sm space-y-4">
                            <h3 class="text-xs font-extrabold text-slate-800 tracking-wide uppercase flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-sky-500 rounded-full animate-pulse"></span>
                                Étape Recrutement
                            </h3>
                            
                            <div class="space-y-4 relative pl-4 border-l border-slate-100">
                                <div class="relative">
                                    <span class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-emerald-500 border-2 border-white ring-4 ring-emerald-50"></span>
                                    <h4 class="text-xs font-bold text-slate-700">Dépôt du Dossier</h4>
                                    <p class="text-[10px] text-slate-400 font-medium">Validé le {{ $application->created_at->format('d/m/Y') }}</p>
                                </div>

                                <div class="relative">
                                    <span class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full {{ $application->status === 'interview' ? 'bg-sky-500 ring-4 ring-sky-50 animate-pulse' : 'bg-slate-300 border-2 border-white' }}"></span>
                                    <h4 class="text-xs font-bold {{ $application->status === 'interview' ? 'text-slate-800' : 'text-slate-400' }}">Entretiens R&D</h4>
                                    <p class="text-[10px] text-slate-400 font-medium">Pipeline technique en attente</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200/60 rounded-3xl p-4 flex flex-col gap-2 shadow-sm">
                            <button type="button" class="w-full bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold py-3 px-4 rounded-xl border border-slate-200/40 flex items-center justify-between transition group">
                                <span>Modifier la fiche</span>
                                <span class="text-slate-400 group-hover:text-[#7C3AED] transition">→</span>
                            </button>
                            <a href="{{ route('applications.index') }}" class="w-full bg-white hover:bg-slate-50 text-slate-500 text-xs font-bold py-3 px-4 rounded-xl text-center transition block">
                                Retour aux opportunités
                            </a>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</x-app-layout>