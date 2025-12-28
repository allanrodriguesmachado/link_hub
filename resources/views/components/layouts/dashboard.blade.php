<x-layouts.app>
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])

    {{-- Mudança: bg-slate-50 no light e bg-slate-950 no dark --}}
    <div class="flex min-h-screen bg-[#f8fafc] dark:bg-slate-950 transition-colors duration-300 overflow-hidden" x-data="{ sidebarOpen: true }">

        <aside
            :class="sidebarOpen ? 'w-72' : 'w-20'"
            class="hidden md:flex flex-col bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 transition-all duration-300 ease-in-out relative z-20">

            <div class="p-6 flex items-center shrink-0" :class="sidebarOpen ? 'justify-start' : 'justify-center'">
                <div class="flex items-center gap-2">
                    {{-- Logo adapta para branco no dark mode --}}
                    <div class="w-8 h-8 bg-black dark:bg-white rounded-lg flex items-center justify-center shrink-0">
                        <div class="w-3 h-3 border-2 border-white dark:border-black rounded-sm rotate-45"></div>
                    </div>
                    <span x-show="sidebarOpen" x-transition.opacity
                          class="text-xl font-bold tracking-tight dark:text-white">LinkHub<span
                            class="text-[var(--primary)]">.</span></span>
                </div>
            </div>

            <nav class="flex-1 px-4 space-y-2 mt-4">
                {{-- Link Estilizado para Dark Mode --}}
                @php
                    $navClasses = "flex items-center gap-3 px-3 py-3 text-sm font-semibold rounded-xl transition-all group ";
                    $activeClasses = "bg-[var(--primary-soft)] text-[var(--primary)] dark:bg-[var(--primary)]/10";
                    $inactiveClasses = "text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white";
                @endphp

                <a href="{{ route('user.dashboard') }}" class="{{ $navClasses }} {{ request()->routeIs('user.dashboard') ? $activeClasses : $inactiveClasses }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity>Dashboard</span>
                </a>

                <a href="{{ route('link.create') }}" class="{{ $navClasses }} {{ request()->routeIs('link.create') ? $activeClasses : $inactiveClasses }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity>Cadastrar Links</span>
                </a>

                <a href="{{ route('profile.index') }}" class="{{ $navClasses }} {{ request()->routeIs('profile.index') ? $activeClasses : $inactiveClasses }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span x-show="sidebarOpen" x-transition.opacity>Perfil</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3 bg-slate-100 dark:bg-slate-800 p-3 rounded-2xl">
                    <div class="w-8 h-8 rounded-full bg-[var(--primary)] text-white flex items-center justify-center font-bold text-xs shrink-0">
                        {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div x-show="sidebarOpen" x-transition.opacity class="overflow-hidden">
                        <p class="text-xs font-bold truncate dark:text-white">{{ auth()->user()->name ?? 'Usuário' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <header class="h-20 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 shrink-0 z-10 transition-colors">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                            class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg text-slate-500 dark:text-slate-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                        </svg>
                    </button>
                    <h2 class="text-sm font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest hidden sm:block">Painel de Controle</h2>
                </div>

                <div class="flex items-center gap-4">
                    <button id="theme-toggle" type="button"
                            class="relative flex items-center justify-center w-12 h-12   text-slate-600 dark:text-yellow-400   hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200  hover:shadow-[var(--primary-soft)] dark:hover:shadow-[var(--primary)]/20">

                        <div class="relative z-10">
                            <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                        </div>
                    </button>
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-2 px-4 py-2 text-xs font-bold text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all border border-transparent hover:border-red-100 dark:hover:border-red-500/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span class="hidden sm:inline">Sair do Sistema</span>
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8">
                {{$slot}}
            </main>
        </div>
    </div>


</x-layouts.app>
