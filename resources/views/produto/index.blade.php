<x-app-layout>
    @include('produto.menu')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-stripped w-full">
                        <thead>
                        <tr class="bg-gray-500 text-left text-white">
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Valor</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td>{{$item->nome}}</td>
                                <td>{{$item->marca}}</td>
                                <td>{{$item->valor_formatado}}</td>
                                <td class="justify-end flex space-x-3">
                                    <a
                                        href="{{\App\Service\RotaService::getRotaEdit($item->id)}}"
                                        class="inline-flex items-center px-1 py-1 bg-gray-800 rounded-md text-xs
                                        text-white uppercase hover:bg-gray-700">
                                        Editar

                                    </a>
                                    <a
                                        href="{{route('produto.delete',['id'=>$item->id])}}"
                                        data-confirm-delete="true"
                                        class="inline-flex items-center px-1 py-1 bg-red-800 rounded-md text-xs text-white uppercase hover:bg-red-700">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
