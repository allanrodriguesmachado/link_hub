<x-layouts.app>
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])

    <main class="flex min-h-screen bg-white">

        <section class="hidden lg:flex w-[45%] flex-col justify-between p-20 glass-panel border-r border-slate-100">
            <div class="reveal" style="animation-delay: 0.1s;">
                <div class="flex items-center gap-2 mb-24">
                    <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center">
                        <div class="w-3 h-3 border-2 border-white rounded-sm rotate-45"></div>
                    </div>
                    <span class="text-xl font-bold tracking-tight">LinkHub<span class="text-[var(--primary)]">.</span></span>
                </div>

                <h1 class="text-display text-6xl font-extrabold leading-[1.1] tracking-tight text-slate-900">
                    Sua marca, <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[var(--primary)] to-orange-400">um único link.</span>
                </h1>
                <p class="mt-8 text-lg text-slate-500 font-medium max-w-sm leading-relaxed">
                    A plataforma definitiva para criadores que buscam profissionalismo e conversão.
                </p>
            </div>

            <div class="reveal" style="animation-delay: 0.3s;">
                <div class="flex items-center gap-4 p-4 bg-white/50 backdrop-blur-md rounded-2xl border border-white/50 w-fit shadow-sm">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-slate-200 border-2 border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-slate-300 border-2 border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-slate-400 border-2 border-white"></div>
                    </div>
                    <p class="text-sm font-semibold text-slate-600">+10k usuários ativos</p>
                </div>
            </div>
        </section>

        <section class="flex-1 flex flex-col justify-center items-center p-6">
            <div class="w-full max-w-[400px] reveal" style="animation-delay: 0.4s;">

                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Entrar</h2>
                    <p class="text-slate-500 mt-2 font-medium">Bom ver você de volta!</p>
                </div>

                <form action="{{ route('auth.authentication') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-bold text-slate-700 tracking-wide uppercase text-[10px]">Endereço de E-mail</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            placeholder="exemplo@linkhub.com"
                            class="form-input"
                        >
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <label for="password" class="text-sm font-bold text-slate-700 tracking-wide uppercase text-[10px]">Sua Senha</label>
                            <a href="#" class="text-xs font-bold text-[var(--primary)] hover:opacity-80 transition-opacity">Esqueci minha senha</a>
                        </div>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            class="form-input"
                        >
                    </div>

                    <button type="submit" class="btn-primary shadow-xl shadow-slate-200">
                        Acessar Painel
                    </button>
                </form>

                <div class="relative my-10">
                    <div class="absolute inset-0 flex items-center"><span class="w-full border-t border-slate-100"></span></div>
                    <div class="relative flex justify-center text-xs uppercase"><span class="bg-white px-4 text-slate-400 font-bold tracking-widest">Ou continue com</span></div>
                </div>

                <a href="{{route('google.provider')}}" class="btn-google">
                    <svg class="w-5 h-5" viewBox="0 0 48 48">
                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                    </svg>
                    <span>Google Workspace</span>
                <a/>

                <p class="text-center mt-12 text-sm font-medium text-slate-500">
                    Ainda não tem conta? <a href="{{route('auth.register')}}" class="text-[var(--primary)] font-bold hover:underline underline-offset-4">Comece grátis</a>
                </p>
            </div>
        </section>
    </main>
</x-layouts.app>
