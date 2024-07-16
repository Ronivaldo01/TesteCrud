<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::all();
        return view('categorias', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cats = new Categoria();
       // $campos = $request->all();
        $cats->nome= $request->input('nome');
        $cats->descricao = $request->input('descricao');
        $cats->status = $request->input('status');
        $cats->save();
        return redirect()
                    ->route('categorias')
                    ->withSuccess('Cadastro realizado com sucesso');
       // dd($cats);
        //return json_encode($prod);
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
        $cat = Categoria::find($id);
        if(isset($cat)) {
            return view('editar-categoria', compact('cat'));
        }
        return redirect('/categorias');
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
        $cat = Categoria::find($id);
        if(isset($cat)) {
            $cat->nome= $request->input('nome');
            $cat->descricao = $request->input('descricao');
            $cat->status = $request->input('status');
            $cat->save();
            return redirect()
                        ->route('categorias')
                        ->withSuccess('Cadastro Atualizado com sucesso');
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
        $cat = Categoria::find($id);
        if (isset($cat)) {
            $cat->delete();
        }
        return redirect()
                        ->route('categorias')
                        ->withSuccess('Cadastro Deletado');
            
    
    }
}
