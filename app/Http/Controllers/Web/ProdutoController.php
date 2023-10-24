<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoUpdateRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Produto::query()->paginate('15');

        $titulo_alerta = 'Deletar Produto';
        $texto_alerta = 'Tem certeza que deseja deletar o produto?';

        ConfirmDelete($titulo_alerta, $texto_alerta);

        return view('produto.index',
            compact('items')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produto.form', [
            'editar' => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = Produto::getModel()->getFillable();
        Produto::query()->create($request->only($campos));
        toast('Produto cadastrado com sucesso!', 'success');
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produto::query()->find($id);
        return view('produto.form', [
            'editar' => true,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoUpdateRequest $request, string $id)
    {
        $campos = Produto::getModel()->getFillable();
        Produto::query()->find($id)->update($request->only($campos));
        toast('Produto editado com sucesso!', 'success');
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::query()->find($id)->delete();

        return redirect()->route('produto.index');
    }
}
