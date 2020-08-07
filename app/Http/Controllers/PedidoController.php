<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    protected $reques;
    private $repository;

    public function __construct(Request $request, pedido $pedido, produto $produto){
        $this->$request = $request;
        $this->repository = $pedido;
        $this->repository_produto = $produto;
    }

    public function index(){
        $pedidos = pedido::all();
        return view('admin.pages.pedidos.index', [
            'produtos' => $pedidos,
        ]);
    }

    public function listpedidos($id){
        $pedidos = $this->repository->search_pedidos($id);
        return view('admin.pages.pedidos.listpedidos', [
            'pedidos' => $pedidos,
        ]);
    }

    public function todospedidos(){
        $pedidos = pedido::all();
        return view('todospedidos', [
            'pedidos' => $pedidos,
        ]);
    }

    public function create(){
        return view('admin.pages.pedidos.create');
    }

    public function store(Request $request){
        $data = $request->only('codigo_do_cliente', 'codigo_do_produto', 'data_de_criacao', 'status');
        $this->repository->create($data);
        return redirect()->back();
    }

    public function show($id){
        if (!$pedido = $this->repository->find($id)){
            return redirect()->back();
        } else {
            return view('admin.pages.pedidos.show', [
                'pedido' => $pedido
            ]);
        }
    }

    public function edit($id){
        if (!$pedido = $this->repository->find($id)){
            return redirect()->back();
        } else {
            return view('admin.pages.pedidos.edit', compact('pedido'));
        }
    }
   
    public function update(Request $request, $id){
        if (!$pedido = $this->repository->find($id)){
            return redirect()->back();
        } else {
            $pedido->update($request->all());
            return redirect()->route('pedidos.todospedidos');
        }
    }

    public function destroy($id){
        $pedido = $this->repository->where('id', $id)->first();
        if (!$pedido){
            return redirect()->back();
        } else {
            $pedido->delete();
            return redirect()->route('clientes.index');
        }
    }

    /*public function search(Request $request){
        $produtos = $this->repository->search($request->filter);
        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
        ]);
    }*/
}
