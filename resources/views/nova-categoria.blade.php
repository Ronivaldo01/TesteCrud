@extends('app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/categorias" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text" class="form-control" name="nome" 
                       id="nome" placeholder="Categoria">
            </div>
            <div class="form-group">
                <label for="descricao">descricao</label>
                <input type="text" class="form-control" name="descricao" 
                       id="descricao" placeholder="descricao">
            </div>
            <div class="form-group">
                <label for="status">status</label>
                <input type="number" class="form-control" name="status" 
                       id="status" placeholder="status">

            </div>
            <select class="form-control" name="status" id="status">              
                <option value="0">Inativo</option>
                <option value="1">Ativo</option>
             </select> 
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href='{{ url("categorias") }}' type="button" class="btn btn-danger btn-sm">Cancel</a>
        </form>
    </div>
</div>
@endsection