<x-layouts.dashboard>
    <div class="max-w-5xl mx-auto px-4 py-10">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 reveal">
            <div>
                <div class="flex items-center gap-2 text-[var(--primary)] font-bold text-xs uppercase tracking-widest mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Modo de Edição
                </div>
                <h1 class="text-display text-4xl font-extrabold text-slate-900 tracking-tight">Editar Link</h1>
                <p class="text-slate-500 font-medium mt-2">Atualize as informações do seu link abaixo.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            <div class="lg:col-span-7 reveal" style="animation-delay: 0.1s;">
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-[0_20px_50px_rgba(0,0,0,0.04)] p-8 md:p-10">
                    <form action="{{ route('link.update', $link) }}" method="POST"  class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <div class="group">
                                <label class="block text-[11px] font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-focus-within:text-[var(--primary)] transition-colors">
                                    Título do Botão
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    id="input-name"
                                    value="{{ old('name', $link->name) }}"
                                    placeholder="Ex: Meu Instagram"
                                    class="w-full bg-slate-50 border-2 border-transparent focus:border-[var(--primary)] focus:bg-white rounded-2xl px-6 py-4 text-slate-700 font-bold transition-all outline-none"
                                    required
                                >
                            </div>

                            <div class="group">
                                <label class="block text-[11px] font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-focus-within:text-[var(--primary)] transition-colors">
                                    URL de Destino
                                </label>
                                <input
                                    type="url"
                                    name="url"
                                    id="input-url"
                                    value="{{ old('url', $link->url) }}"
                                    placeholder="https://instagram.com/seu-perfil"
                                    class="w-full bg-slate-50 border-2 border-transparent focus:border-[var(--primary)] focus:bg-white rounded-2xl px-6 py-4 text-slate-700 font-bold transition-all outline-none"
                                    required
                                >
                            </div>
                        </div>

                        <div class="pt-4 flex items-center gap-4">
                            <button type="submit" class="bg-slate-900 hover:bg-black text-white px-10 py-4 rounded-2xl font-bold transition-all shadow-lg hover:shadow-black/20 flex items-center gap-2">
                                Atualizar Dados
                            </button>
                            <a href="{{ route('user.dashboard') }}" class="text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors">Descartar alterações</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-5 hidden lg:block reveal" style="animation-delay: 0.2s;">
                <div class="bg-slate-900 rounded-[3rem] p-4 border-[8px] border-slate-800 shadow-2xl sticky top-10">
                    <div class="bg-white rounded-[2.5rem] h-[500px] overflow-hidden flex flex-col items-center p-8">
                        <div class="w-16 h-16 bg-slate-100 rounded-full mb-4"></div>
                        <div class="w-24 h-3 bg-slate-100 rounded-full mb-8"></div>

                        <div id="preview-button" class="w-full py-4 border-2 border-[var(--primary)] bg-white shadow-md rounded-2xl flex flex-col items-center justify-center transition-all">
                            <span id="preview-name" class="text-slate-900 font-bold text-sm">{{ $link->name }}</span>
                            <span id="preview-url" class="text-slate-400 text-[10px] truncate max-w-[150px]">{{ $link->url }}</span>
                        </div>

                        <div class="mt-auto">
                            <div class="flex items-center gap-2 opacity-30">
                                <div class="w-6 h-6 bg-black rounded-md flex items-center justify-center">
                                    <div class="w-2 h-2 border border-white rounded-sm rotate-45"></div>
                                </div>
                                <span class="text-[10px] font-bold tracking-tight">LinkHub.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.dashboard>
