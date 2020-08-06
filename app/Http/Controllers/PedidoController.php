<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    protected $reques;
    private $repository;
    private $repository_produto;

    public function __construct(Request $request, pedido $pedido, produto $produto)
    {
        $this->$request = $request;
        $this->repository = $pedido;
        $this->repository_produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = pedido::all();
        return view('admin.pages.pedidos.index', [
            'produtos' => $pedidos,
        ]);
    }

    public function listpedidos($id)
    {
        $pedidos = $this->repository->search_pedidos($id);

        /*foreach ($pedidos as $pedido) {
            dd($pedido->codigo_do_produto);
        }*/


        //dd($pedidos);

        return view('admin.pages.pedidos.listpedidos', [
            'pedidos' => $pedidos,
        ]);
    }

    public function todospedidos()
    {
        $pedidos = pedido::all();

        /*foreach ($pedidos as $pedido) {
            dd($pedido->codigo_do_produto);
        }*/


        //dd($pedidos);

        return view('todospedidos', [
            'pedidos' => $pedidos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('codigo_do_cliente', 'codigo_do_produto', 'data_de_criacao', 'status');
        $this->repository->create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$pedido = $this->repository->find($id))
            return redirect()->back();


        //$produto = $this->repository->find($id);    
        //dd("$produto");
        return view('admin.pages.pedidos.show', [
            'pedido' => $pedido
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
        if (!$pedido = $this->repository->find($id))
            return redirect()->back();


        dd("oi");
        //return view('admin.pages.pedidos.edit', compact('pedido'));
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
        if (!$pedido = $this->repository->find($id)){
            return redirect()->back();
        } else {
            $pedido->update($request->all());

        
            return redirect()->route('pedidos.todospedidos');
            
        }
    }

    /*public function atualizar(Request $request, $id)
    {
        if (!$pedido = $this->repository->find($id)){
            return redirect()->back();
        } else {
            $pedido->update($request->all());
           // dd($request);
            
        }
    }*/

    /*public function update_cliente(Request $request, $id)
    {
        if (!$pedido = $this->repository->find($id)){
            return redirect()->back();
        } else {
            $pedido->update($request->all());
            //dd($request);
            return redirect()->route('pedidos.listpedidos');
        }
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = $this->repository->where('id', $id)->first();
        if (!$pedido){
            return redirect()->back();
        } else {

            $pedido->delete();

            return redirect()->route('clientes.index');
        }
    }

    /*public function search(Request $request)
    {
        $produtos = $this->repository->search($request->filter);

        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
        ]);
    }*/
}
