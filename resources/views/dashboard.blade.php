<x-layouts.dashboard>
    <div class="max-w-5xl mx-auto px-4 py-10">

        <div class="flex items-center justify-between mb-10 reveal">
            <div>
                <h1 class="text-display text-4xl font-extrabold text-slate-900 tracking-tight">Meus Links</h1>
                <p class="text-slate-500 font-medium">Gerencie seus destinos ativos.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 reveal" style="animation-delay: 0.1s;">
            @forelse($links as $link)
                <div
                    class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-md transition-all group relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-1 h-full bg-[var(--primary)] opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <div class="flex items-center gap-5">

                        <div class="flex flex-col gap-1">
                            @if(!$loop->first)
                                <form action="{{ route('link.up', $link->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="p-1 text-slate-300 hover:text-[var(--primary)] transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 15l7-7 7 7"></path>
                                        </svg>
                                    </button>
                                </form>
                            @endif

                            @if(!$loop->last)
                                <form action="{{ route('link.down', $link->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                       class="p-1 text-slate-300 hover:text-[var(--primary)] transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </form>

                            @endif
                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-[var(--primary-soft)] text-[var(--primary)] flex items-center justify-center text-xl font-black shrink-0">
                            {{ strtoupper(substr($link->name, 0, 1)) }}
                        </div>

                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-bold text-slate-900 truncate">
                                {{ $link->name }}
                            </h3>
                            <p class="text-sm font-medium text-slate-400 truncate flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                </svg>
                                {{ $link->url }}
                            </p>
                        </div>

                        <div class="flex items-center gap-1">
                            <a href="{{ route('link.edit', $link->id) }}"
                               class="p-3 text-slate-300 hover:text-[var(--primary)] hover:bg-[var(--primary-soft)] rounded-xl transition-all"
                               title="Editar Link">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>

                            <form action="{{ route('link.destroy', $link) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="p-3 text-slate-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full py-20 bg-slate-50 rounded-[2.5rem] border-2 border-dashed border-slate-200 flex flex-col items-center justify-center">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-slate-300 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    <p class="text-slate-500 font-bold text-lg">Nenhum link por aqui</p>
                    <p class="text-slate-400 text-sm mb-6">Comece adicionando o seu primeiro <span class="text-black font-bold text-md">
                            LinkHub
                        </span><span class="text-[var(--primary)] font-bold text-lg">.</span></p>
                    <a href="{{ route('link.create') }}" class="btn-primary !w-auto px-8">Criar meu primeiro link</a>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.dashboard>
