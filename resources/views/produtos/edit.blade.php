@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
                </div>
  
                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div><br />
                  @endif
                  <form method="post" action="{{ route('produtos.update', $listaProduto->id ) }}">
                        <div class="form-group">
                            @csrf
                            @method('PATCH')
                            <label for="nome">Nome do Produto:</label>
                            <input type="text" class="form-control" name="nome"  value="{{ $listaProduto->nome }}"/>
                        </div>
                        <div class="form-group">
                            <label for="preço">Preço:</label>
                            <input type="text" class="form-control" name="preço"  value="{{ $listaProduto->preço }}" />
                        </div>
                        <div class="form-group">
                            <label for="quantidade">Quantidade:</label>
                            <input type="text" class="form-control" name="quantidade"  value="{{ $listaProduto->quantidade }}" />
                        </div>
                        <div class="form-group">
                            <label for="sku">SKU:</label>
                            <input type="text" class="form-control" name="sku"  value="{{ $listaProduto->sku }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection