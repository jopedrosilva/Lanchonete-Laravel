<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\produto;

use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class ClienteController extends Controller
{
    protected $reques;
    private $repository;

    public function __construct(Request $request, cliente $cliente)
    {
        $this->$request = $request;
        $this->repository = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = cliente::latest()->first();
        $produtos = produto::all();
        return view('admin.pages.clientes.index', [
            'teste' => $teste,
            'produtos' => $produtos,
        ]);
    }


    public function listarclientes()
    {
        $clientes = cliente::all();
        return view('listarclientes', [
            'clientes' => $clientes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('nome', 'email', 'telefone', 'endereco');
        $this->repository->create($data);

        return redirect()->route('clientes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$cliente = $this->repository->find($id))
            return redirect()->back();


        //$produto = $this->repository->find($id);    
        //dd("$produto");
        return view('admin.pages.clientes.show', [
            'cliente' => $cliente
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
        if (!$cliente = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.clientes.edit', compact('cliente'));
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
        if (!$cliente = $this->repository->find($id))
            return redirect()->back();

        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->repository->where('id', $id)->first();
        if (!$cliente)
            return redirect()->back();

        $cliente->delete();

        return redirect()->route('clientes.index');
    }

    

    /*public function search(Request $request)
    {
        $clientes = $this->repository->search($request->filter);

        return view('admin.pages.clientes.index', [
            'clientes' => $clientes,
        ]);
    }*/
}
