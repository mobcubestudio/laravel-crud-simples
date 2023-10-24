@php
    $mostraObjeto = true;
@endphp
<x-app-layout>
    @include('produto.menu')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($mostraObjeto && env('APP_ENV') === 'local' && $editar == true)
                        <div class="inline-flex items-center text-sm w-full bg-red-500 p-2 rounded text-white mb-6">
                            {{$data}}
                        </div>
                    @endif

                    <form action="{{\App\Service\RotaService::getRotaForm()}}" method="post">

                        @csrf

                        <div class="space-y-6">
                            <div>
                                <x-input-label for="nome" value="Nome"/>
                                <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full"
                                              :value="old('nome', ($editar) ? $data->nome : '')" required autofocus
                                              autocomplete="nome"/>
                                <x-input-error class="mt-2" :messages="$errors->get('nome')"/>
                            </div>

                            <div>
                                <x-input-label for="marca" value="Marca"/>
                                <x-text-input id="marca" name="marca" type="text" class="mt-1 block w-full"
                                              :value="old('marca', ($editar) ? $data->marca : '')" required autofocus
                                              autocomplete="marca"/>
                                <x-input-error class="mt-2" :messages="$errors->get('marca')"/>
                            </div>

                            <div>
                                <x-input-label for="valor" value="Marca"/>
                                <x-text-input id="valor" name="valor" type="text" class="mt-1 block w-full"
                                              :value="old('valor', ($editar) ? $data->valor : '')" required autofocus
                                              autocomplete="valor"/>
                                <x-input-error class="mt-2" :messages="$errors->get('valor')"/>
                            </div>

                            <x-primary-button>
                                Salvar
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
