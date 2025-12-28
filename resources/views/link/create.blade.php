<x-layouts.dashboard>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            <div class="lg:col-span-7">
                <div class="bg-white rounded-[2.5rem] border border-slate-100 p-10 shadow-sm">
                    <form action="{{route('link.store')}}" method="POST" class="space-y-8">
                        @csrf

                        <div class="group">
                            <label class="block text-[11px] font-black uppercase tracking-widest text-slate-400 mb-3">Título do Botão</label>
                            <input
                                type="text"
                                name="name"
                                id="input-name"
                                placeholder="Ex: Meu Instagram"
                                class="w-full bg-slate-50 border-2 border-transparent focus:border-[var(--primary)] focus:bg-white rounded-2xl px-6 py-4 text-slate-700 font-bold transition-all outline-none"
                            >
                        </div>

                        <div class="group">
                            <label class="block text-[11px] font-black uppercase tracking-widest text-slate-400 mb-3">URL de Destino</label>
                            <input
                                type="url"
                                name="url"
                                id="input-link" {{-- ID para o JS --}}
                                placeholder="https://instagram.com/seu-perfil"
                                class="w-full bg-slate-50 border-2 border-transparent focus:border-[var(--primary)] focus:bg-white rounded-2xl px-6 py-4 text-slate-700 font-bold transition-all outline-none"
                            >
                        </div>

                        <button type="submit" class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-bold shadow-lg">
                            Salvar
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-5 hidden lg:block">
                <div class="bg-slate-900 rounded-[3rem] p-4 border-[8px] border-slate-800 shadow-2xl sticky top-10">
                    <div class="bg-white rounded-[2.5rem] h-[500px] flex flex-col items-center p-8">
                        <div class="w-16 h-16 bg-slate-100 rounded-full mb-4 flex items-center justify-center text-slate-300">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="w-24 h-3 bg-slate-100 rounded-full mb-8"></div>

                        <div id="preview-button" class="w-full py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl flex flex-col items-center justify-center transition-all">
                            <span id="preview-name" class="text-slate-900 font-bold text-sm">Título do Link</span>
                            <span id="preview-url" class="text-slate-400 text-[10px] truncate max-w-[180px]">sua-url.com</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.dashboard>
