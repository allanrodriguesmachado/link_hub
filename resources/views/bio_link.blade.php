<x-layouts.app>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 flex flex-col items-center px-6 py-16 relative overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-72 h-72 bg-[var(--primary)] opacity-[0.03] rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-orange-400 opacity-[0.03] rounded-full blur-3xl"></div>

        <div class="w-full max-w-[620px] relative z-10 flex-grow">

            <div class="text-center mb-12 animate-in fade-in slide-in-from-bottom-4 duration-700">
                <div class="relative inline-block">
                    <div class="absolute inset-0 bg-[var(--primary)] opacity-20 blur-2xl rounded-full scale-110"></div>
                    <div class="relative w-32 h-32 rounded-[2.5rem] overflow-hidden border-[6px] border-white shadow-2xl mx-auto mb-6 rotate-3 hover:rotate-0 transition-transform duration-500">
                        <img src="/storage/{{ $user->photo }}" class="w-full h-full object-cover" alt="{{ $user->name }}">
                    </div>
                </div>

                <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">{{ $user->name }}</h1>

                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white border border-slate-100 rounded-full shadow-sm mb-4">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">
                        {{ str_replace('@', '', $user->handler) }}
                    </span>
                </div>

                @if($user->description)
                    <p class="text-slate-500 text-base font-medium leading-relaxed max-w-sm mx-auto">
                        {{ $user->description }}
                    </p>
                @endif
            </div>

            <div class="flex flex-col gap-4 animate-in fade-in slide-in-from-bottom-8 duration-1000 delay-200">
                @foreach($user->links()->orderBy('sort', 'asc')->get() as $link)
                    <a href="{{ $link->url }}" target="_blank"
                       class="group relative overflow-hidden flex items-center p-1 bg-white/70 backdrop-blur-md border border-white/50 rounded-[1.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-300">
                        <div class="relative flex items-center justify-between w-full p-4">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-slate-50 flex items-center justify-center text-xl font-black text-slate-800 group-hover:text-[var(--primary)] group-hover:scale-110 transition-all duration-300">
                                    {{ strtoupper(substr($link->name, 0, 1)) }}
                                </div>
                                <div class="flex flex-col text-left">
                                    <span class="font-extrabold text-slate-800 group-hover:text-black">{{ $link->name }}</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all transform translate-y-2 group-hover:translate-y-0">Visitar</span>
                                </div>
                            </div>
                            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-50 group-hover:bg-[var(--primary)] group-hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7"></path></svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <footer class="w-full py-8 mt-auto flex justify-center">
            <div class="flex items-center gap-2 p-2 px-4 bg-white/40 backdrop-blur-sm rounded-2xl border border-white/40 shadow-sm opacity-60 hover:opacity-100 transition-all duration-500">
                <div class="w-5 h-5 bg-black rounded flex items-center justify-center">
                    <div class="w-1.5 h-1.5 border border-white rotate-45"></div>
                </div>
                <span class="text-[10px] font-black tracking-widest uppercase text-slate-900">Powered by LinkHub</span>
            </div>
        </footer>
    </div>
</x-layouts.app>
