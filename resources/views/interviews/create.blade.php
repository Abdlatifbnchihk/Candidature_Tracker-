<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] pb-12">
        <header class="bg-white border-b border-slate-100 px-8 py-4">
            <div class="max-w-3xl mx-auto flex items-center justify-between">
                <h1 class="text-xl font-bold text-slate-800 tracking-tight">Schedule an Interview</h1>
                <span class="text-xs font-bold text-[#7C3AED] bg-purple-50 px-3 py-1 rounded-xl">
                    {{ $application->company }} — {{ $application->position }}
                </span>
            </div>
        </header>

        <main class="max-w-3xl mx-auto px-8 mt-8">
            <div class="mb-6">
                <a href="{{ route('applications.show', $application->id) }}" class="text-black/60 text-xs font-bold transition duration-150 hover:text-[#7C3AED] underline underline-offset-1">
                    ← Back to tracking
                </a>
            </div>

            <div class="bg-white border border-slate-200/60 rounded-3xl p-8 shadow-sm">
                <form method="POST" action="{{ route('interviews.store', $application->id) }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="type" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Interview Type</label>
                            <select name="type" id="type" required class="w-full bg-slate-50 border border-slate-200 rounded-xl text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#7C3AED]/20 focus:border-[#7C3AED] transition font-medium text-slate-700">
                                {{-- Changed from $application to $typeLabels to match typical Laravel logic --}}
                                @foreach($typeLabels as $value => $label)
                                    <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('type') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="datetime" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Date & Time</label>
                            <input type="datetime-local" name="datetime" id="datetime" required value="{{ old('datetime') }}"
                                   class="w-full bg-slate-50 border border-slate-200 rounded-xl text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#7C3AED]/20 focus:border-[#7C3AED] transition text-slate-700 font-medium">
                            @error('datetime') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="result" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Result / Status</label>
                        <select name="result" id="result" required class="w-full bg-slate-50 border border-slate-200 rounded-xl text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#7C3AED]/20 focus:border-[#7C3AED] transition font-medium text-slate-700">
                            @foreach($resultLabels as $value => $label)
                                <option value="{{ $value }}" {{ old('result') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('result') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="notes" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Notes & Preparation</label>
                        <textarea name="notes" id="notes" rows="5" placeholder="Expected questions, key talking points, technical feedback..."
                                  class="w-full bg-slate-50 border border-slate-200 rounded-xl text-sm p-4 focus:outline-none focus:ring-2 focus:ring-[#7C3AED]/20 focus:border-[#7C3AED] transition text-slate-700 leading-relaxed">{{ old('notes') }}</textarea>
                        @error('notes') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                        <a href="{{ route('applications.show', $application->id) }}" class="text-xs font-bold text-slate-400 hover:text-slate-600 px-4 py-2.5 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-[#7C3AED] hover:bg-[#6D28D9] text-white text-xs font-bold px-5 py-3 rounded-xl shadow-lg shadow-purple-500/10 transition duration-150">
                            Save Step
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</x-app-layout>