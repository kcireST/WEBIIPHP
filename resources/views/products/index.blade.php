@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p><strong>R$ {{ number_format($product->price, 2, ',', '.') }}</strong></p>
                        <a href="#" class="btn btn-success">Comprar</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
