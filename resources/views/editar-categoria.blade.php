@extends('app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action='{{ url("categorias/$cat->id ") }}' method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text" class="form-control" name="nome" value="{{$cat->nome}}"
                       id="nome" placeholder="Categoria">
            </div>
            <div class="form-group">
                <label for="descricao">descricao</label>
                <input type="text" class="form-control" name="descricao" value="{{$cat->descricao}}"
                       id="descricao" placeholder="descricao">
            </div>
            <div class="form-group">
                <select class="form-control" name="status" id="status">  
                @if( $cat->status == 0 )
                    {{ $selected = 'selected' }};
                    <option value="{{$cat->status}}" selected="{{ $selected}}">Inativo</option>
                    <option value="1">Ativo</option>
                    @else
                    {{ $selected = 'selected' }};
                    <option value="{{$cat->status}}" selected="{{ $selected}}">Ativo</option>
                    <option value="0">Inativo</option>
                    @endif
                </select> 
             </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a href='{{ url("categorias") }}' type="button" class="btn btn-danger btn-sm">Cancel</a>
        </form>
    </div>
</div>

@endsection