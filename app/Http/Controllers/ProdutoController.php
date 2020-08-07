<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
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