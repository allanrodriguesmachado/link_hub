<x-layouts.app>
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])

    <main class="flex min-h-screen bg-white">

        <section class="flex-1 flex flex-col justify-center items-center p-6">
            <div class="w-full max-w-[400px] reveal" style="animation-delay: 0.4s;">

                <div class="mb-10 text-center lg:text-left">
                    <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Criar Conta</h2>
                    <p class="text-slate-500 mt-2 font-medium">Preencha os dados abaixo para se registrar.</p>
                </div>

                <form action="{{route('auth.store')}}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label for="name" class="text-sm font-bold text-slate-700 tracking-wide uppercase text-[10px]">Nome Completo</label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            placeholder="Digite o seu Nome"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-sm font-bold text-slate-700 tracking-wide uppercase text-[10px]">Endereço de E-mail</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            placeholder="Digite o seu E-mail"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-sm font-bold text-slate-700 tracking-wide uppercase text-[10px]">Senha</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Digite a sua senha"
                            class="form-input"
                            required
                        >
                    </div>

                    <button type="submit" class="btn-primary shadow-xl shadow-slate-200">
                        Enviar Cadastro
                    </button>
                </form>

                <div class="relative my-10">
                    <div class="absolute inset-0 flex items-center"><span class="w-full border-t border-slate-100"></span></div>
                    <div class="relative flex justify-center text-xs uppercase"><span class="bg-white px-4 text-slate-400 font-bold tracking-widest">Ou</span></div>
                </div>

                <p class="text-center mt-6 text-sm font-medium text-slate-500">
                    Já tem conta? <a href="{{ route('auth.login') }}" class="text-[var(--primary)] font-bold hover:underline underline-offset-4">Fazer Login</a>
                </p>
            </div>
        </section>
    </main>
</x-layouts.app>
