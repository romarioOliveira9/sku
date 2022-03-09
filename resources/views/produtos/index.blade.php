@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header"><div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('produtos.create') }}">Adicionar Novo Produto</a>
                  </div></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Lista dos Produtos</h1>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"># ID</th>
                                    <th scope="col">Nome do Produto</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Deletar</th>
                                </tr>
                            </thead>
                            <tbody>

                              @foreach($listaProdutos as $produto)
                              <tr>
                                  <td>{{$produto->id}}</td>
                                  <td>{{$produto->nome}}</td>
                                  <td>{{$produto->preço}}</td>
                                  <td>{{$produto->quantidade}}</td>
                                  <td>{{$produto->sku}}</td>
                                  <td><a href="{{ route('produtos.edit', $produto->id)}}" class="btn btn-primary">Editar</a></td>
                                  <td>
                                      <form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Deletar</button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection