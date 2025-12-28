<x-layouts.dashboard>
    <div class="max-w-6xl mx-auto py-12 px-6">
        <div class="flex flex-col md:flex-row gap-12">

            <div class="w-full md:w-1/3">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Configurações</h2>
                <p class="text-slate-500 mt-4 leading-relaxed">
                    Personalize sua identidade no LinkHub. Essas informações ficarão visíveis para quem acessar seu link.
                </p>

                <div class="mt-8 p-6 bg-[var(--primary-soft)] rounded-2xl border border-[var(--primary)]/10">
                    <h4 class="text-[var(--primary)] font-bold text-sm uppercase tracking-wider">Dica Profissional</h4>
                    <p class="text-slate-600 text-sm mt-2">Uma foto de perfil clara e um usuário curto ajudam a passar mais profissionalismo para sua marca.</p>
                </div>
            </div>

            <div class="flex-1">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                      class="bg-white p-6 md:p-10 rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col sm:flex-row items-center gap-6 pb-8 border-b border-slate-50">
                        <div class="relative">
                            <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-white shadow-md bg-slate-100 flex-shrink-0">
                                @if($user->photo)
                                    <img src="/storage/{{ $user->photo }}"
                                         class="w-full h-full object-cover object-center"
                                         id="preview">
                                @else
                                    <div id="placeholder" class="w-full h-full flex items-center justify-center text-slate-300">
                                        <svg class="w-14 h-14" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                        </svg>
                                    </div>
                                    <img src="" class="w-full h-full object-cover object-center hidden" id="preview">
                                @endif
                            </div>
                        </div>

                        <div class="flex-1 text-center sm:text-left">
                            <label class="text-sm font-bold text-slate-700 uppercase text-[10px] block mb-2 tracking-widest">Foto de Perfil</label>
                            <input type="file" name="photo" id="photo_input" class="hidden" accept="image/*" onchange="previewImage(event)">

                            <button type="button" onclick="document.getElementById('photo_input').click()"
                                    class="px-5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-100 hover:border-slate-300 transition-all">
                                Alterar imagem
                            </button>

                            <p class="text-slate-400 text-[11px] mt-3 italic">Formatos aceitos: JPG, PNG ou WebP. Máximo 2MB.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="text-sm font-bold text-slate-700 uppercase text-[10px] ml-1 tracking-widest">Nome de Exibição</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                   class="w-full px-5 py-4 rounded-2xl border border-slate-100 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-[var(--primary)] focus:border-transparent outline-none transition-all">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="handler" class="text-sm font-bold text-slate-700 uppercase text-[10px] ml-1 tracking-widest">Usuário (@)</label>
                            <input type="text" id="handler" name="handler" value="{{ old('handler', $user->handler) }}"
                                   class="w-full px-5 py-4 rounded-2xl border border-slate-100 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-[var(--primary)] focus:border-transparent outline-none transition-all">
                            @error('handler') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="description" class="text-sm font-bold text-slate-700 uppercase text-[10px] ml-1 tracking-widest">Bio / Descrição</label>
                        <textarea id="description" name="description" rows="4"
                                  class="w-full px-5 py-4 rounded-2xl border border-slate-100 bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-[var(--primary)] focus:border-transparent outline-none transition-all resize-none">{{ old('description', $user->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-black text-white rounded-2xl font-bold hover:bg-slate-800 transition-all shadow-xl shadow-slate-200 active:scale-[0.98] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const output = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');

            reader.onload = function(){
                output.src = reader.result;
                output.classList.remove('hidden');
                if(placeholder) placeholder.classList.add('hidden');
            };

            if(event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
</x-layouts.dashboard>
