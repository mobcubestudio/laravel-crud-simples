@php
    $resource = 'Produto';
@endphp
<x-slot name="header">
    <div class="grid grid-cols-2">
        <div class="col-span-1">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{\App\Service\RotaService::getTitulo(resource: $resource)}}
            </h2>
        </div>
        <div class="col-span-1 inline-flex justify-end">
            <a href="{{route(\App\Service\RotaService::getRotaCreate())}}">
                <x-primary-button>
                    + Novo
                </x-primary-button>
            </a>
        </div>
    </div>
</x-slot>
