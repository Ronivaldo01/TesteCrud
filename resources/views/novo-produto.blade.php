@extends('app', ["current" => "Novos Produtos"])

@section('body')
<div class="card border">
    <div class="card-body">
            <form class="form-horizontal" id="formProduto" action='{{ url("produtos") }}' method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Novo produto</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nomeProduto" class="control-label">Nome do Produto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do produto">
                            @csrf
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="control-label">Descricao</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do produto">
                        </div>
                    </div>                     
                    <div class="form-group">
                        <label for="categoria" class="control-label">Categoria</label>
                        <div class="input-group">
                        
                            <select class="form-control" name="categoria_id" id="categoria_id">
                            @foreach($prods as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->nome }}</option>
                          
                            @endforeach
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a href='{{ url("produtos") }}' type="button" class="btn btn-danger btn-sm">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection