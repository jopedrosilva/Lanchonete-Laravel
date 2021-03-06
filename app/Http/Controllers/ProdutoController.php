<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller{
    protected $reques;
    private $repository;

    public function __construct(Request $request, produto $produto)
    {
        $this->$request = $request;
        $this->repository = $produto;
    }

    public function index(){
        $produtos = produto::all();
        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
        ]);
    }

    public function listprodutos(){
        $produtos = produto::all();
        return view('welcome', [
            'produtos' => $produtos,
        ]);
    }

    public function create(){
        return view('admin.pages.produtos.create');
    }

    /**
     * @param \App\Http\Requests\StoreUpdateProdutoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'preco' => 'required|min:1|max:9'
        ]);
        
        $data = $request->only('nome', 'preco');
        $this->repository->create($data);
        return redirect()->route('produtos.index');
    }

    public function show($id){
        if (!$produto = $this->repository->find($id)){
            return redirect()->back();
        } else {
            return view('admin.pages.produtos.show', [
                'produto' => $produto
            ]);
        }
    }

    public function edit($id){
        if (!$produto = $this->repository->find($id)){
            return redirect()->back();
        } else {
            return view('admin.pages.produtos.edit', compact('produto'));
        }
    }
    
    public function update(Request $request, $id){
        if (!$produto = $this->repository->find($id)){
            return redirect()->back();
        } else {
            $produto->update($request->all());
            //dd($produto);
            return redirect()->route('produtos.index');
        }
    }

    public function destroy($id){
        $produto = $this->repository->where('id', $id)->first();
        if (!$produto){
            return redirect()->back();
        } else {
            $produto->delete();
            return redirect()->route('produtos.index');
        }
    }

    public function search(Request $request){
        $produtos = $this->repository->search($request->filter);
        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
        ]);
    }
}