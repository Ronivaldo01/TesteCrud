@extends('app', ["current" => "produtos" ])

@section('body')  
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Lista de produtos</h5>
        @include('includes.alerts')
        <table id="tabProdutos" class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Produto</th>
                    <th>Descrição</th>
                    <th>categoria</th>
                </tr>
            </thead>
            <tbody>
                
            @foreach($prods as $prod)
                @if( $prod->categoria->status == 1)
                <tr>
                    <td>{{ $prod->id }}</td>                  
                    <td>{{ $prod->nome }}</td>
                    <td>{{ $prod->descricao }}</td>  
                    <td >{{ $prod->categoria->nome }}</td>
                    <td>
                        <a href='{{ url("produtos/editar/$prod->id") }}' class="btn btn-sm btn-primary">Editar</a>
                        <a href='{{ url("produtos/apagar/$prod->id") }}' class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
                 @endif
             @endforeach                          	
            </tbody>   
        </table>   
        <a class="btn btn-primary" href='{{ url("novo-produto") }}'>Cadastrar Produtos</a>     
    </div>   
</div>
@endsection