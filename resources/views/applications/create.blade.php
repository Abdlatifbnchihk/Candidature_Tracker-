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
                    <input type="text" placeholder="Rechercher..." class="w-full bg-slate-50 text-sm placeholder-slate-400 pl-10 pr-4 py-2 border-0 rounded-xl focus:bg-white focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition duration-150">
                </div>
                <div class="flex items-center gap-4">
                    <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                        @csrf
                        <button type="submit" class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-semibold text-sm px-4 py-2 rounded-xl shadow-md transition duration-150">
                            <span>Déconnexion</span>
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-8 max-w-[1000px] w-full mx-auto space-y-6">
                <div class="flex items-center gap-2 text-xs font-bold tracking-wide text-slate-400 uppercase">
                    <a href="{{ route('applications.index') }}" class="hover:text-[#7C3AED] transition">Dashboard</a>
                    <span>/</span>
                    <span class="text-[#7C3AED]">Nouvelle Candidature</span>
                </div>

                <div class="space-y-1">
                    <h1 class="text-2xl font-extrabold text-[#1E1B4B] tracking-tight">Ajouter un suivi</h1>
                    <p class="text-slate-500 text-sm font-medium">Remplissez les détails pour ne laisser aucune opportunité au hasard.</p>
                </div>

                <div class="bg-white border border-slate-200/60 rounded-3xl p-8 shadow-sm">
                    <form method="POST" action="{{ route('applications.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="company" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Entreprise</label>
                                <input type="text" name="company" id="company" value="{{ old('company') }}" required placeholder="Ex: Stripe, Vercel" 
                                    class="w-full bg-slate-50 text-sm text-slate-800 placeholder-slate-400 px-4 py-3 border border-slate-200/80 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-[#7C3AED] transition">
                                @error('company') <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="position" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Poste / Rôle</label>
                                <input type="text" name="position" id="position" value="{{ old('position') }}" required placeholder="Ex: Développeur Fullstack" 
                                    class="w-full bg-slate-50 text-sm text-slate-800 placeholder-slate-400 px-4 py-3 border border-slate-200/80 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-[#7C3AED] transition">
                                @error('position') <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="status" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Statut</label>
                                <select name="status" id="status" required class="w-full bg-slate-50 text-sm text-slate-700 px-4 py-3 border border-slate-200/80 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-[#7C3AED] transition">
                                    @foreach($statusLabels as $value => $label)
                                        <option value="{{ $value }}" {{ old('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label for="priority" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Priorité d'intérêt</label>
                                <select name="priority" id="priority" required class="w-full bg-slate-50 text-sm text-slate-700 px-4 py-3 border border-slate-200/80 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-[#7C3AED] transition">
                                    @foreach($priorityLabels as $value => $label)
                                        <option value="{{ $value }}" {{ old('priority') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="url" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Lien de l'offre (Optionnel)</label>
                                <input type="url" name="url" id="url" value="{{ old('url') }}" placeholder="https://..." 
                                    class="w-full bg-slate-50 text-sm text-slate-800 placeholder-slate-400 px-4 py-3 border border-slate-200/80 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-[#7C3AED] transition">
                                @error('url') <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="applied_at" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Date de postulation</label>
                                <input type="date" name="applied_at" id="applied_at" value="{{ old('applied_at', date('Y-m-d')) }}" 
                                    class="w-full bg-slate-50 text-sm text-slate-800 px-4 py-3 border border-slate-200/80 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-[#7C3AED] transition">
                                @error('applied_at') <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="notes" class="text-xs font-bold text-slate-500 uppercase tracking-wider">Notes & Remarques</label>
                            <textarea name="notes" id="notes" rows="3" placeholder="Détails, noms des recruteurs, questions préparées..." 
                                class="w-full bg-slate-50 text-sm text-slate-800 placeholder-slate-400 px-4 py-3 border border-slate-200/80 rounded-xl focus:bg-white focus:ring-4 focus:ring-purple-500/10 focus:border-[#7C3AED] transition">{{ old('notes') }}</textarea>
                            @error('notes') <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="file" class="text-xs font-bold text-slate-500 uppercase tracking-wider">CV ou Lettre de motivation (PDF, Word...)</label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col w-full h-32 border-2 border-dashed border-slate-200 rounded-xl hover:bg-slate-50 hover:border-[#7C3AED]/30 transition cursor-pointer group">
                                    <div class="flex flex-col items-center justify-center pt-7">
                                        <svg class="w-8 h-8 text-slate-300 group-hover:text-[#7C3AED]/50 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                        <p class="pt-1 text-xs font-bold text-slate-400 group-hover:text-slate-500 transition">Cliquez pour ajouter un fichier</p>
                                    </div>
                                    <input type="file" name="file" id="file" class="hidden" />
                                </label>
                            </div>
                            @error('file') <p class="text-xs text-red-500 mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                            <a href="{{ route('applications.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs px-6 py-3 rounded-xl transition duration-150">
                                Annuler
                            </a>
                            <button type="submit" class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-bold text-xs px-8 py-3 rounded-xl shadow-lg shadow-purple-500/10 flex items-center gap-2 transition duration-150">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg>
                                <span>Enregistrer la candidature</span>
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>