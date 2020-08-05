<?php

namespace App\Http\Controllers;

use App\Models\produto;
use App\Models\User;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $reques;
    private $repository;

    public function __construct(Request $request, produto $produto)
    {
        $this->$request = $request;
        $this->repository = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$teste = 1234;
        //$produtos = ['TV', 'Celular', 'Cadeira', 'Forno', 'Porta'];
        //return view('teste', compact('teste'));
        $produtos = produto::all();
        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('nome', 'preco');
        $this->repository->create($data);
        //produto::create($data);
        
        //dd($request->only('nome', 'preco'));
        return redirect()->route('produtos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$produto = $this->repository->find($id))
            return redirect()->back();


        //$produto = $this->repository->find($id);    
        //dd("$produto");
        return view('admin.pages.produtos.show', [
            'produto' => $produto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$produto = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$produto = $this->repository->find($id))
            return redirect()->back();

        $produto->update($request->all());

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->repository->where('id', $id)->first();
        if (!$produto)
            return redirect()->back();

        $produto->delete();

        return redirect()->route('produtos.index');
    }

    public function search(Request $request)
    {
        $produtos = $this->repository->search($request->filter);

        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
        ]);
    }
}
