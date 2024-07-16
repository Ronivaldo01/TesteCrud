<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultProds = Produto::with('categoria')->get();
        $prods=[]; 
         foreach($resultProds as $resultProd)
         {
            $prods[] = $resultProd; 
         }
       return view('produtos', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prods = Categoria::all();
        //dd($prods);
        return view('novo-produto',compact('prods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $prod = new Produto();
        $prod->nome= $request->input('nome');
        $prod->descricao = $request->input('descricao');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();
        return redirect()
                    ->route('produtos')
                    ->withSuccess('Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prods = Produto::find($id);
        $cats = Categoria::all();
        $dados = [];
        if(isset($prods)) {
            $dados = [
                'categorias' => $cats,
                'produtos' => $prods
            ];
         return view('editar-produto', compact('dados'));
        }
        return redirect('produtos');
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
        $prod = Produto::find($id);
        if(isset($prod)) {
            $prod->nome= $request->input('nome');
            $prod->descricao = $request->input('descricao');
            $prod->categoria_id = $request->input('categoria_id');
            $prod->save();
            return redirect()
                        ->route('produtos')
                        ->withSuccess('Produto Atualizado com sucesso');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->delete();
        }
        return redirect()
                        ->route('produtos')
                        ->withSuccess('Produto Deletado');
    }
}
