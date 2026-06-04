<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] pb-12">

        <main class="max-w-7xl mx-auto px-8 mt-8">

            <div class="w-1/6 mb-8 mx-5">
                <a href="{{ route('dashboard') }}"
                    class="text-black/60 text-xs font-bold transition duration-150 tracking-wider underline underline-offset-1 flex items-center gap-1.5 hover:text-[#7C3AED]">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Back to Dashboard</span>
                </a>
            </div>

            <div
                class="bg-gradient-to-r from-slate-100 via-slate-50 to-white border border-slate-200/60 rounded-3xl p-8 relative overflow-hidden shadow-sm mb-8">
                <div class="relative z-10 max-w-2xl">
                    <span class="text-xs font-bold tracking-wider text-slate-500 uppercase block mb-1">Data History</span>
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Archived <span
                            class="text-slate-600">Applications</span></h1>
                    <p class="text-slate-500 text-sm leading-relaxed">Review the complete history of your past opportunities, completed, closed, or rejected offers to maintain full visibility over your career path.</p>
                </div>
                <div class="absolute right-16 bottom-4 text-slate-200/80 hidden md:block">
                    <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
            </div>

            <div
                class="bg-white border border-slate-200/60 rounded-2xl p-4 mb-8 shadow-sm flex flex-wrap items-center justify-between gap-4">
                <form method="GET" action="{{ route('applications.archive') }}"
                    class="w-full flex flex-wrap items-center justify-between gap-4 m-0">
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="flex items-center gap-2">
                            <label for="status" class="text-xs font-bold text-slate-400 uppercase tracking-wider">Historical Status:</label>
                            <select name="status" id="status" onchange="this.form.submit()"
                                class="bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-500/20">
                                <option value="">All Archived Statuses</option>
                                @foreach($statusLabels as $value => $label)
                                    <option value="{{ $value }}" {{ $currentStatus == $value ? 'selected' : '' }}>{{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if($currentStatus)
                        <a href="{{ route('applications.archive') }}"
                            class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Reset Filter
                        </a>
                    @endif
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

                <div class="lg:col-span-3 bg-white border border-slate-200/60 rounded-2xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                        <h2 class="font-bold text-slate-800 tracking-tight flex items-center gap-2">
                            <span class="w-2 h-2 bg-slate-400 rounded-full"></span>
                            Closed Files
                        </h2>
                        <span class="text-xs text-slate-400 font-medium">Total: {{ $applications->count() }} archived item(s)</span>
                    </div>

                    

                    @if($applications->isEmpty())
                        <div class="p-16 text-center text-slate-400">
                            <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                            <p class="text-sm font-medium">No archived applications found at the moment.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        <th class="py-3 px-6">Company & Position</th>
                                        <th class="py-3 px-6 text-center">Initial Priority</th>
                                        <th class="py-3 px-6 text-center">Final Status</th>
                                        <th class="py-3 px-6 text-right">Application Date</th>
                                        <th class="py-3 px-6 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm">
                                    @foreach($applications as $application)
                                        <tr class="hover:bg-slate-50/40 transition duration-100 group">
                                            <td class="py-4 px-6">
                                                <div
                                                    class="font-bold text-slate-700 group-hover:text-slate-900 transition-colors">
                                                    {{ $application->company }}
                                                </div>
                                                <div class="text-xs text-slate-400 font-medium mt-0.5">
                                                    {{ $application->position }}
                                                </div>
                                            </td>

                                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                                @php
                                                    $priorityClass = match ($application->priority) {
                                                        'high', 'haute' => 'bg-rose-50/60 text-rose-500/90 border-rose-100/60',
                                                        'medium', 'moyenne' => 'bg-amber-50/60 text-amber-500/90 border-amber-100/60',
                                                        default => 'bg-slate-50 text-slate-400 border-slate-100',
                                                    };
                                                @endphp
                                                <span
                                                    class="inline-block px-2.5 py-0.5 text-xs font-medium rounded-lg border {{ $priorityClass }}">
                                                    {{ $priorityLabels[$application->priority] ?? $application->priority }}
                                                </span>
                                            </td>

                                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                                @php
                                                    $statusClass = match ($application->status) {
                                                        'offer', 'offre' => 'bg-emerald-500 text-white',
                                                        'rejected', 'refuse' => 'bg-rose-500 text-white',
                                                        'refused', 'annulé' => 'bg-slate-400 text-white',
                                                        default => 'bg-slate-200 text-slate-700',
                                                    };
                                                @endphp
                                                <span
                                                    class="inline-block px-3 py-0.5 text-xs font-bold rounded-full shadow-sm {{ $statusClass }}">
                                                    {{ $statusLabels[$application->status] ?? $application->status }}
                                                </span>
                                            </td>

                                            <td
                                                class="py-4 px-6 text-right text-xs font-semibold text-slate-400/90 whitespace-nowrap">
                                                {{ $application->applied_at ? $application->applied_at->format('m/d/Y') : 'N/A' }}
                                            </td>

                                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                                <div class="flex items-center justify-end gap-1.5">

                                                    <form method="POST"
                                                        action="{{ route('applications.restore', $application->id) }}"
                                                        class="inline m-0 p-0"
                                                        onsubmit="return confirm('Confirm restoring this application from the archive?');">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="w-8 h-8 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-xl flex items-center justify-center transition duration-150 cursor-pointer"
                                                            title="Restore">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2.2"
                                                                    d="M3 10a8 8 0 0114.32-4.906M21 4v6h-6" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2.2"
                                                                    d="M21 11a8 8 0 01-15.32 4.906M3 20v-6h6" />
                                                            </svg>
                                                        </button>
                                                    </form>

                                                    <form method="POST"
                                                        action="{{ route('applications.destroy', $application->id) }}"
                                                        class="inline m-0 p-0"
                                                        onsubmit="return confirm('Warning! Do you want to permanently delete this application from your history? This action cannot be undone.');">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="w-8 h-8 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl flex items-center justify-center transition duration-150 cursor-pointer"
                                                            title="Delete permanently">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2.2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

                    <div
                        class="px-6 py-3 bg-slate-50/50 border-t border-slate-100 text-center text-xs text-slate-400 font-medium">
                        📁 These files no longer impact your active monitoring metric dashboards.
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
