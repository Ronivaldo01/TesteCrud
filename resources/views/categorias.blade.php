@extends('app', ["current" => "categorias"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Categorias</h5>
        @include('includes.alerts')

@if(count($cats) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome da Categoria</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nome}}</td>
                @if( $cat->status == 0 )
                    <td>Inativo</td>
                @else
                    <td>Ativo</td>
                @endif
                    <td>
                        <a href='{{ url("categorias/editar/$cat->id ") }}' class="btn btn-sm btn-primary">Editar</a>
                        <a href='{{ url("categorias/apagar/$cat->id ") }}' class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <a href='{{ url("nova-categoria") }}' class="btn btn-sm btn-primary" role="button">Nova categoria</a>
    </div>
</div>



@endsection