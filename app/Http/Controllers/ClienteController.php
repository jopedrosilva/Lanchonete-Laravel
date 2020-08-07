<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\produto;
use Illuminate\Http\Request;

class ClienteController extends Controller{
    protected $reques;
    private $repository;

    public function __construct(Request $request, cliente $cliente){
        $this->$request = $request;
        $this->repository = $cliente;
    }
    public function index(){
        $teste = cliente::latest()->first();
        $produtos = produto::all();
        return view('admin.pages.clientes.index', [
            'teste' => $teste,
            'produtos' => $produtos,
        ]);
    }


    public function listarclientes(){
        $clientes = cliente::all();
        return view('listarclientes', [
            'clientes' => $clientes,
        ]);
    }

    public function create(){
        return view('admin.pages.clientes.create');
    }

    public function store(Request $request){
        $data = $request->only('nome', 'email', 'telefone', 'endereco');
        $this->repository->create($data);
        return redirect()->route('clientes.index');
    }

    public function show($id){
        if (!$cliente = $this->repository->find($id)){
            return redirect()->back();
        } else {
            return view('admin.pages.clientes.show', [
                'cliente' => $cliente
            ]);
        }
    }

    public function edit($id)
    {
        if (!$cliente = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id){
        if (!$cliente = $this->repository->find($id)){
            return redirect()->back();
        } else {
            $cliente->update($request->all());
            return redirect()->route('clientes.index');
        }
    }

    public function destroy($id){
        $cliente = $this->repository->where('id', $id)->first();
        if (!$cliente){
            return redirect()->back();
        } else {
            $cliente->delete();
            return redirect()->route('clientes.index');
        }
    }

    

    /*public function search(Request $request){
        $clientes = $this->repository->search($request->filter);
        return view('admin.pages.clientes.index', [
            'clientes' => $clientes,
        ]);
    }*/
}
